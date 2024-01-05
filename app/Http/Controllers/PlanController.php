<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Producto;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Guiar\Subscription\PayPalClient;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $planes = Plan::all();
        $planIdUser = null;
        $searchPlan = null;

        $isPlan = auth()->check() ? auth()->user()->isPlan : false;
        $lastSubscription = auth()->check() ? auth()->user()->lastSubscription: null;

        if ($lastSubscription) {
            $searchPlan = Plan::find($lastSubscription->plan_id);
        }


        return view('subscription.plans', [
            'productos' => $productos,
            'planes' => $planes,
            'isPlan' => $isPlan,
            'lastSubscription' => $lastSubscription,
            'searchPlan' => $searchPlan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function suscripcion(Request $request)
    {
        $id = $request->input('id');
        $plan = Plan::where('id', $id)->first();

        return view('subscription.create', [
            'plan' => $plan,
        ]);
    }

    public function show($suscripcionsId, PayPalClient $payPalClient)
    {
        return $payPalClient->getSubscription($suscripcionsId, true);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PayPalClient $payPalClient)
    {
        $subscription = $payPalClient->getSubscription($request->input('subscription_id'));
        $plan_id = $request->input('plan_id');


        if ($subscription && $subscription->status !== 'ACTIVE') {
            //ERROR
            return response()->json([
                'success' => false,
                'message' => 'La suscripcion no esta activa. Status: ' . $subscription->status
            ], 401);
        }

        //convertir zonas horarias
        $appTimeZone = config('app.timezone');
        $starTime = Carbon::parse($subscription->start_time, 'UTC')->tz($appTimeZone);
        $startedAt = $starTime->format('Y-m-d H:i:s');

        $payPalPlanId = $subscription->plan_id;
        $plan =Plan::find($plan_id);

        if($payPalPlanId == $plan->paypalId && $plan->tipo == 'Anual'){
            $finishTime = $starTime->addYear();
        }else{
            $finishTime = $starTime->addMonth();
        }
        $finish_at = $finishTime->format('Y-m-d H:i:s');

        $nextBillingTime = Carbon::parse($subscription->billing_info->next_billing_time, 'UTC')->tz($appTimeZone)
            ->format('Y-m-d H:i:s');

        Subscription::create([
            "user_id" => auth()->id(),
            "plan_id" => $plan_id,
            'paypal_plan_id' => $subscription->plan_id,
            'price' => $subscription->billing_info->last_payment->amount->value,
            "started_at" => $startedAt,
            "finish_at" => $finish_at,
            "next_billing" => $nextBillingTime,
            "renewal" => true,
            "ended_at" => null,
            "renewal_cancelled_at" => null,
            "paypal_subscription_id" => $subscription->id
        ]);

        return response()->json([
            'success' => true,
        ], 201);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
