<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $array = json_decode('{"id":27,"name":"default","url":"https:\/\/abac-2806-2f0-4060-e7d5-c3fe-a49c-e46b-cf54.ngrok-free.app\/api\/webhook\/receipt","headers":[],"payload":{"type":"receipts.update","receipts":[{"tip":0,"note":null,"order":null,"source":"point of sale","payments":[{"name":"Card","type":"NONINTEGRATEDCARD","paid_at":"2024-03-02T05:58:57.000Z","money_amount":58,"payment_details":null,"payment_type_id":"2ae7f7b2-22bf-468f-813c-70dd606a46eb"}],"store_id":"176cb35a-e21f-438a-96d8-99d1e0852a2e","surcharge":0,"total_tax":8,"created_at":"2024-03-02T05:58:58.000Z","line_items":[{"id":"9553152a-9dae-cbca-f6a3-2ab6d918516c","sku":"10000","cost":17,"price":25,"item_id":"af70ed89-4b59-41d4-8a5d-62c802fc5a49","quantity":2,"item_name":"Dorito","line_note":null,"cost_total":34,"line_taxes":[{"id":"8c1d2fdd-7796-4d76-b76c-a64c9a4403b2","name":"M\u00e9xico","rate":16,"type":"ADDED","money_amount":8}],"variant_id":"6bc1a062-3867-4382-b383-ebb89d31d75c","total_money":58,"variant_name":null,"line_discounts":[],"line_modifiers":[],"total_discount":0,"gross_total_money":50}],"refund_for":null,"updated_at":"2024-03-02T05:58:58.000Z","customer_id":null,"employee_id":"17ce6516-92ee-45ea-8823-1e7957cd9443","total_money":58,"total_taxes":[{"id":"8c1d2fdd-7796-4d76-b76c-a64c9a4403b2","name":"M\u00e9xico","rate":16,"type":"ADDED","money_amount":8}],"cancelled_at":null,"receipt_date":"2024-03-02T05:58:57.000Z","receipt_type":"SALE","dining_option":"Dine in","points_earned":0,"pos_device_id":"e26930c6-d979-4bbb-b931-ca064b91cb56","points_balance":0,"receipt_number":"1-1006","total_discount":0,"points_deducted":0,"total_discounts":[]}],"created_at":"2024-03-02T05:59:03.541Z","merchant_id":"b835e2e1-20e3-4af4-8df6-faa4ebe71adc"},"exception":null,"created_at":"2024-03-02T05:59:03.000000Z","updated_at":"2024-03-02T05:59:03.000000Z"}  ');
    $payload = $array->payload;
    if ($payload->type == 'receipts.update') {

    }
    $receipt = $payload->receipts[0];

    $client = new \GuzzleHttp\Client(['verify' => false]);
    $headers = [
        'Content-Type' => 'application/json',
        'auth' => [env('FACTURAMA_USER'), env('FACTURAMA_PASSWORD')],
    ];
    $items = [];
    foreach ($receipt->line_items as $product) {

        $object = [];
        $object['ProductCode'] = '10101504';
        $object['IdentificationNumber'] = $product->sku;
        $object['Description'] = $product->item_name;
        $object['Unit'] = 'NO APLICA';
        $object['UnitCode'] = 'H87';
        $object['UnitPrice'] = $product->price;
        $object['Quantity'] = intval($product->quantity);
        $object['Subtotal'] = $product->gross_total_money;
        $object['TaxObject'] = '02';

        $object['Taxes'][] = [
            'Total' => $product->line_taxes[0]->money_amount,
            'Name' => 'IVA',
            'Base' => $product->total_money / 1.16,
            'Rate' => 0.16,
            'IsRetention' => false,

        ];

        $object['Total'] = $product->total_money;

        $items[] = $object;
    }

    //return response()->json($items);
    $date = new DateTime();
    $body = [
        'NameId' => 1,
        'Currency' => 'MXN',
        'Folio' => null,
        'Serie' => null,
        'CfdiType' => 'I',
        'PaymentForm' => '03',
        'PaymentMethod' => 'PUE',
        'OrderNumber' => $receipt->receipt_number,
        'ExpeditionPlace' => '64320',
        'Date' => $date->format('Y-m-d\TH:i:sO'),
        'PaymentConditions' => '',
        'Observations' => '',
        'Exportation' => '01',
        'Receiver' => [
            'Rfc' => 'URE180429TM6',
            'CfdiUse' => 'CP01',
            'Name' => 'UNIVERSIDAD ROBOTICA ESPAÑOLA',
            'FiscalRegime' => '601',
            'TaxZipCode' => '86991',
        ],
        'Items' => $items,
    ];

    //try {

    $response = $client->request('POST', 'https://apisandbox.facturama.mx/3/cfdis', [
        'timeout' => 120000,
        'body' => json_encode($body),
        'headers' => [
            'accept' => 'application/json',
            'Authorization' => 'Basic '.base64_encode(env('FACTURAMA_USER').':'.env('FACTURAMA_PASSWORD')),
            'content-type' => 'application/json',
        ],
    ]);
    /*
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return response()->json(($e->getResponse()->getBody()->getContents()));
    }
    */
    $data = $response->getBody()->getContents();
    $data = json_decode($data, true);

    return response()->json($data);

    //return view('welcome');
});
