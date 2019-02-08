<?php

namespace Laravel\Cashier;

class Subscription
{
    /**
     *
     */
    public static function create($params)
    {
        $request = new Request();
        return $request->post('/api/v1/subscriptions/create', $params);
    }

    /**
     *
     */
    public static function cancel($params)
    {
        $request = new Request();
        return $request->post('/api/v1/subscriptions/' . $params['subscription_id'] . '/cancel');
    }
}
