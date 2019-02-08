<?php

namespace Laravel\Cashier;

trait Billable
{
    /**
     *
     */
    public function setMerchantCreds($clientId, $clientSecret)
    {
        $this->creds = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];
    }
    /**
     *
     */
    public function createCustomer($id = null) {
        $customer = new Customer($id);
        $customer->create($this->creds);
    }
}
