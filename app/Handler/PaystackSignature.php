<?php

namespace App\Handler;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class PaystackSignature implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header($config->signatureHeaderName);

        return true;
        /*if (! $signature) {
            return false;
        }
        $signingSecret = $config->signingSecret;
        if (empty($signingSecret)) {
            throw WebhookFailed::signingSecretNotSet();
        }
        $computedSignature = hash_hmac('sha512', $request->getContent(), $signingSecret);

        return hash_equals($signature, $computedSignature);
        */
    }
}
