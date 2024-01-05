<?php

return array(

    /**
     * Sandbox and live
     */
    'sandbox_client_id' => env('PAYPAL_SANDBOX_CLIENT_ID',''),
    'sandbox_secret'    => env('PAYPAL_SANDBOX_SECRET',''),
    'live_client_id' => env('PAYPAL_LIVE_CLIENT_ID',''),
    'live_secret'    => env('PAYPAL_LIVE_SECRET',''),

    /**
     * SDK configurations settings
     */

     'settings' => [
        // Payment Mode: 'sandbox' or 'live'
        'mode' => env('PAYPAL_MODE','sandbox'),
     ]

);
