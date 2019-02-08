<?php

namespace Laravel\Cashier;

class PayPal
{
    /**
     *
     */
    public static function getRedirectUrl($params = null)
    {
        $request = new Request();
        return $request->post('/api/v1/paypal/billing-agreements/get-redirect-url', $params);
    }
}
