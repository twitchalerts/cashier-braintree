<?php

namespace Laravel\Cashier;

class Customer
{
    /**
     *
     */
    public static function create($params = null)
    {
        $request = new Request();
        return $request->post('/api/v1/customers', $params);
    }

    /**
     *
     */
    public static function linkPaymentMethod($params)
    {
        $request = new Request();
        return $request->post('/api/v1/customers/link-payment-method', $params);
    }
}
