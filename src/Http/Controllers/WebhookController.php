<?php

namespace Laravel\Cashier\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    /**
     *
     */
    public function handleWebhook(Request $request)
    {
        try {
            $webhook = $this->parseWebhookNotification($request);
        } catch (Exception $e) {
            return;
        }

        $method = 'handle'.studly_case(str_replace('.', '_', $webhook->kind));
        if (method_exists($this, $method)) {
            return $this->{$method}($webhook);
        }

        return $this->missingMethod();
    }

    /**
     *
     */
    public function parseWebhookNotification($request)
    {
        $originalHash = $request->headers->get('signature');
        $token = $request->headers->get('token');
        $timestamp = $request->headers->get('timestamp');
        $clientId = config('payments.billing.client_id');
        $algo = 'sha256';

        $data = $token . $timestamp;
        $calculatedHash = hash_hmac($algo, $data, $clientId);

        if (hash_equals($originalHash, $calculatedHash)) {
            // hashes matched, process data
            return  json_decode(json_encode($request->all()));
        } else {
            throw new Exception('Hash did not match');
        }
    }


    /**
     * Handle calls to missing methods on the controller.
     */
    public function missingMethod($parameters = [])
    {
        return new Response;
    }
}
