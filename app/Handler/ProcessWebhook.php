<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;
use App\Traits\ReceiptsTrait;
//The class extends "ProcessWebhookJob" class as that is the class
//that will handle the job of processing our webhook before we have
//access to it.

class ProcessWebhook extends ProcessWebhookJob
{
    use ReceiptsTrait;

    public function handle()
    {
        $data = json_decode($this->webhookCall, true);
        \Log::info(json_encode($data['payload']));

        $this->ProccessReceiptPayment($data['payload']);
        http_response_code(200);
    }
}
