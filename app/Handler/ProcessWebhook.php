<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

//The class extends "ProcessWebhookJob" class as that is the class
//that will handle the job of processing our webhook before we have
//access to it.

class ProcessWebhook extends ProcessWebhookJob
{
    public function handle()
    {
        $data = json_decode($this->webhookCall, true);
        // take action since the charge was success
        // Create order
        // Sed email
        // Whatever you want
        \Log::info(json_encode($data));

        //Acknowledge you received the response
        http_response_code(200);
    }
}
