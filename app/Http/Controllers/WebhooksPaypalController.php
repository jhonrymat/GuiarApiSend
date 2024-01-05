<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\PaypalWebhookEvent;
use Illuminate\Support\Facades\Log;



class WebhooksPaypalController extends Controller
{
    const EVENT_SUBSCRIPTION_CANCELLED = 'BILLING.SUBSCRIPTION.CANCELLED';
    const EVENT_PAYMENT_COMPLETED = 'PAYMENT.SALE.COMPLETED';
    //webhooks
    public function webhooksPaypal(Request $request){
        $eventId = $request->input('id');

        if(PaypalWebhookEvent::where('event_id', $eventId)->exists()){
            Log::info('Este evento de paypal ya ha sido procesado con el id:' . $eventId);
            return;
        }

        //process event webhooks paypal
        $event_type = $request->input('event_type');
        PaypalWebhookEvent::create([
            'event_id'=> $eventId,
            'event_type'=> $event_type,
            'body' => (string) $request->getContent()
        ]);

        $resource = $request->input('resource');
        $createTime = $request->input('create_time');
        if($event_type === self::EVENT_SUBSCRIPTION_CANCELLED){
            $this->eventSubscriptionCancelled($resource);
        }else if ($event_type === self::EVENT_PAYMENT_COMPLETED){
            $this->eventPaymentCompleted($createTime, $resource);
        }
    }

    private function eventPaymentCompleted($createTime, $resource){
        $paypaSubscripcionId = $resource['billing_agreement_id'];
        $amount = $resource['amount']['total'];

        $appTimeZone = config('app.timezone');
        $createTime = Carbon::parse($createTime, 'UTC')->tz($appTimeZone);

        $subscription = Subscription::where('paypal_subscription_id', $paypaSubscripcionId)
        ->orderBy('created_at', 'desc')
        ->first();

        $startedAt = Carbon::parse($subscription->started_at);
        $finishAt = Carbon::parse($subscription->finish_at);

        $createTimeClosesToStartedAt = $createTime->diffInMinutes($startedAt) < $createTime->diffInMinutes($finishAt);

        if($createTimeClosesToStartedAt){
            Log::info('no es nesesario crear una nueva suscripcion para: '. $paypaSubscripcionId);
        }else{
            $plan = Plan::find($subscription->plan_id);
            $newStartedAt = $subscription->finish_at;
            $nextBilling = Carbon::parse($subscription->next_billing);

            if($subscription->paypal_plan_id === $plan->paypaId && $plan->tipo == 'Anual'){
                $newFinishAt = $finishAt->addMonth();
                $newNextBilling = $nextBilling->addMonth();
            }else{
                $newFinishAt = $finishAt->addYear();
                $newNextBilling = $nextBilling->addYear();
            }

            Subscription::create([
                "user_id" => $subscription->user_id,
                "plan_id" => $subscription->plan_id,

                "started_at" => $newStartedAt,
                "finish_at" => $newFinishAt->format('Y-m-d H:i:s'),
                "next_billing" => $newNextBilling->format('Y-m-d H:i:s'),
                "renewal" => true,
                "ended_at" => null,
                "renewal_cancelled_at" => null,
                "paypal_subscription_id" => $paypaSubscripcionId,
                'paypal_plan_id' => $subscription->paypal_plan_id,
                'price' => $amount,
            ]);
        }

    }

    private function eventSubscriptionCancelled($resource){
        //descripcion del evento
        Log::info('Paypal event: Subscription cancelled id:' . $resource['id']);
        //encotrar la suscripcion con el id entregado por el webhooks
        $subscription = Subscription::where('paypal_subscription_id',$resource['id'])
        ->firstOrFail();
        $subscription->cancel();
    }


}
