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

    /**
     *
     */
    public static function search($params)
    {
        $request = new Request();
        return $request->get('/api/v1/customers/search', $params);
    }

    /**
     *
     */
    public static function cancelAllActiveSubscriptions($params)
    {
        $request = new Request();
        return $request->post('/api/v1/customers/' . $params['customer_id'] . '/cancel-all-active-subs');
    }
}
