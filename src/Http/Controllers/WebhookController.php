<?php

namespace Laravel\Cashier\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Illuminate\Routing\Controller;
use Braintree\WebhookNotification;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    /**
     *
     */
    public function handleWebhook(Request $request)
    {
        //
    }
}
