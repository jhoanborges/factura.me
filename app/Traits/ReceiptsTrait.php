<?php

namespace App\Traits;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;

trait ReceiptsTrait
{
    public function insertBilling(array $data)
    {

        if (env('APP_ENV') == 'local') {
            $user = User::find(1)->id;
        } else {
            $user = auth()->user()->id;
        }


        //dd($data);
        //array_filter($data, fn ($value) => !is_null($value) && $value !== '');

        $receipt = Receipt::create([
            'user_id' => $user,
            'receipt_id' => $data['Id'],
            'CfdiType' => $data['CfdiType'] ?? null,
            'Type' => $data['Type'] ?? null,
            'Serie' => $data['Serie'] ?? null,
            'Folio' => $data['Folio'] ?? null,
            'Date' => $data['Date'] ?? null,
            'CertNumber' => $data['CertNumber'] ?? null,
            'PaymentTerms' => $data['PaymentTerms'] ?? null,
            'PaymentMethod' => $data['PaymentMethod'] ?? null,
            'PaymentAccountNumber' => $data['PaymentAccountNumber'] ?? null,
            'PaymentBankName' => $data['PaymentBankName'] ?? null,
            'ExpeditionPlace' => $data['ExpeditionPlace'] ?? null,
            'ExchangeRate' => $data['ExchangeRate'] ?? null,
            'Currency' => $data['Currency'] ?? null,
            'Subtotal' => $data['Subtotal'] ?? null,
            'Discount' => $data['Discount'] ?? null,
            'Total' => $data['Total'] ?? null,
            'Observations' => $data['Observations'] ?? null,
            'OrderNumber' => $data['OrderNumber'] ?? null,
            'Issuer' => json_encode($data['Issuer']) ?? [],
            'Receiver' => json_encode($data['Receiver']) ?? [],
            'Items' => json_encode($data['Items']) ?? [],
            'Taxes' => json_encode($data['Taxes']) ?? [],
            'Complement' => json_encode($data['Complement']) ?? [],
            'Status' => $data['Status'] ?? null,
            'OriginalString' => $data['OriginalString'] ?? null,
        ]);
        return $receipt;
    }
}
