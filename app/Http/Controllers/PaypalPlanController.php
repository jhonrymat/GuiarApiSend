<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Guiar\Subscription\PayPalClient;
use GuzzleHttp\Exception\ClientException;

class PaypalPlanController extends Controller
{
    const PRODUCT_ID_PAYPAL = 'PROD-6GU69134D2594171D';

    private $paypalClient;


    public function __construct(PayPalClient $payPalClient)
    {
        $this->paypalClient = $payPalClient;
        $this->middleware('auth');
    }

    //cancelar suscripcion paypal
    public function cancel(PayPalClient $payPalClient)
    {
        $subscription = auth()->user()->lastSubscription;
        if(!$subscription){
            return back();
        }

        $body =[
            'reason' => 'Usuario cancelado desde la plataforma'
        ];

        $statusCode = $payPalClient->cancelSubscription($subscription->paypal_subscription_id, $body);
        // $statusCode = 204;
        if($statusCode >= 200 && $statusCode < 300){
            //metodo cancel
            $subscription->cancel();
            $notification = 'Tu suscripción se ha cancelado correctamente';
        } else{
            $notification='Ocurrio un error inesperado. Por favor escribe un mensaje a jhonrymat@gmail.com, si necesitas ayuda.';
        }


        return back()->with(compact('notification'));

    }



    //listar todos los planes

    public function index()
    {
        return $this->paypalClient->getPlans();
    }

    public function createProduct()
    {
        $product = [
            'name' => 'Suscripción Plan Plus Guiar Go',
            'description' => 'Plan Plus.',
            'type' => 'SERVICE',
            'category' => 'SOFTWARE',
            'image_url' => 'https://i.postimg.cc/YSjP8fwj/guiargo.png',
            'home_url' => 'https://guiargo.software'
        ];

        // try {
        //     return $this->paypalClient->createProduct($product);
        // } catch (ClientException $exception) {
        //     dd($exception->getResponse()->getBody()->getContents());
        // }
    }

    public function createMonthlyPlan()
    {
        //crear un nuevo plan de pago mensual
        $id = self::PRODUCT_ID_PAYPAL;
        $name = 'Guiar Go Suscripción mensual Plus';
        $description = 'Plan Plus, suscripción mensual.';
        $frequency = 'MONTH';
        $price = '99';

        $planBody = $this->buildPlanBody($id, $name, $description, $frequency, $price);

        // try {
        //     return $this->paypalClient->createPlans($planBody);
        // } catch (ClientException $exception) {
        //     dd($exception->getResponse()->getBody()->getContents());
        // }
    }

    public function createYearlyPlan()
    {
        //crear un nuevo plan de pago anual
        $id = self::PRODUCT_ID_PAYPAL;
        $name = 'Guiar Go Suscripción anual Plus';
        $description = 'Plan Plus, suscripción anual.';
        $frequency = 'YEAR';
        $price = '899';

        $planBody = $this->buildPlanBody($id, $name, $description, $frequency, $price);

        // try {
        //     return $this->paypalClient->createPlans($planBody);
        // } catch (ClientException $exception) {
        //     dd($exception->getResponse()->getBody()->getContents());
        // }
    }

    private function buildPlanBody($planId, $planName, $planDescription, $frequencyUnit, $planPrice)
    {
        $fixedPrice = [
            'value' => $planPrice,
            'currency_code' => 'USD'

        ];

        $billingCycle = [
            'frequency' => [
                'interval_unit' => $frequencyUnit, //mensual o anual
                'interval_count' => 1
            ],
            'tenure_type' => 'REGULAR',
            'sequence' => 1,
            'total_cycles' => 0, //ciclo infinito
            'pricing_scheme' => [
                'fixed_price' => $fixedPrice
            ]
        ];

        $paymentPreferences = [
            "auto_bill_outstanding" => true,
            "setup_fee" => [
                "value"=> 0,
                "currency_code"=> "USD"
            ],
            "setup_fee_failure_action" => "CONTINUE",
            "payment_failure_threshold" => 3
        ];


        $taxes = [
            "percentage" => 0,
            "inclusive" => false
        ];


        return [
            'product_id' => $planId,
            'name'=> $planName,
            'description'=> $planDescription,
            'status' => 'ACTIVE',
            'billing_cycles' => [
                $billingCycle
            ],
            'payment_preferences' => $paymentPreferences,
            'taxes'=> $taxes

        ];

    }
}

//---------SANDBOX---------------

//PRODUCTOS PREMIUM
//     "id": "PROD-89K41998VC149225H",
//     "name": "Suscripción Plan Premium Guiar Go",

    //MENSUAL


    //ANUAL




//PRODUCTOS ESENCIAL
//     "id": "PROD-4G9695609J468880H",
//     "name": "Suscripción Plan Esencial Guiar Go",

    //MENSUAL
    //id": "P-1FU20713BS0866046MWIKCVI",
    //precio:29

    //ANUAL
    //"id": "P-184847468C0785708MWIKDII",
    //precio: 299

//PRODUCTOS PROFESIONAL
//     "id": "PROD-7UE26677626820702",
//     "name": "Suscripción Plan Profesional Guiar Go",

    //MENSUAL
        // "id": "P-0YE8071312446352SMWIJ3RQ"
        //precio: 45
    //ANUAL
        // "id": "P-2SG95263AE4093434MWIJ5FQ"
        // precio: 480


//PRODUCTOS PLUS
//      "id": "PROD-6GU69134D2594171D",
//      "name": "Suscripción Plan Plus Guiar Go",

    //MENSUAL
        //"id": "P-8BL42385GC7113633MWIKICQ"
        //precio: 99


    //ANUAL
        // "id": "P-5RP936075X2548443MWIKJDQ"
        //precio: 899


//---------LIVE---------------



//---------suscripciones

//  marcela  I-3J5WM5YAMHMC
//  John Doe I-A6XR4Y9VP8RJ ---I-CBMTNSGMAMF0
