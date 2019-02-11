<?php

namespace Laravel\Cashier;

class Subscription
{
    const ACTIVE = 'Active';
    const CANCELED = 'Canceled';
    const EXPIRED = 'Expired';
    const PAST_DUE = 'Past Due';
    const PENDING = 'Pending';

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

    /**
     *
     */
    public static function cancelAndRefund($params)
    {
        $request = new Request();
        return $request->post('/api/v1/subscriptions/' . $params['subscription_id'] . '/cancel-and-refund');
    }
}
