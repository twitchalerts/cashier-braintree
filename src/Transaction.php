<?php

namespace Laravel\Cashier;

class Transaction
{
    /**
     *
     */
    public static function refund($params)
    {
        $request = new Request();
        return $request->post('/api/v1/transactions/' . $params['transaction_id'] . '/refund');
    }

    /**
     *
     */
    public static function charge($params)
    {
        $request = new Request();
        return $request->post('/api/v1/transactions/charge', $params);
    }
}
