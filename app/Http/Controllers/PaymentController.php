<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ReceiptsTrait;
use DateTime;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    use ReceiptsTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$data = array('Id' => 'tn1C8tgGJBQNXSiPlnYveg2', 'CfdiType' => 'ingreso', 'Type' => 'I - ingreso', 'Serie' => '', 'Folio' => '71', 'Date' => '2024-03-03T11:34:36', 'CertNumber' => '00001000000704353790', 'PaymentTerms' => '03 - Transferencia electrónica de fondos', 'PaymentMethod' => 'PUE - Pago en una sola exhibición', 'PaymentAccountNumber' => '', 'PaymentBankName' => '', 'ExpeditionPlace' => '64320', 'ExchangeRate' => 0, 'Currency' => 'MXN - Peso Mexicano', 'Subtotal' => 50, 'Discount' => 0, 'Total' => 58, 'Observations' => '', 'OrderNumber' => '1-1006', 'Issuer' => array('FiscalRegime' => '612 - Personas Físicas con Actividades Empresariales y Profesionales', 'Rfc' => 'BOHJ9409218N7', 'TaxName' => 'JHOAN JESUS BORGES HENRICHE', 'Email' => 'jhoan.borges@hexagun.mx', 'Phone' => '8116168792', 'TaxAddress' => array('Street' => 'Tuxpan', 'ExteriorNumber' => '706A', 'InteriorNumber' => '', 'Neighborhood' => 'Mitras Norte', 'ZipCode' => '64320', 'Municipality' => 'Monterrey', 'State' => 'NUEVO LEON', 'Country' => 'México'), 'IssuedIn' => array('Street' => '', 'ExteriorNumber' => '', 'Neighborhood' => '-', 'ZipCode' => '64320', 'Municipality' => '', 'State' => '', 'Country' => 'MEXICO')), 'Receiver' => array('Rfc' => 'URE180429TM6', 'Name' => 'UNIVERSIDAD ROBOTICA ESPAÑOLA', 'Email' => ''), 'Items' => array(array('ProductCode' => '10101504', 'IdentificationNumber' => '10000', 'UnitCode' => 'H87', 'Discount' => 0, 'CuentaPredial' => '', 'Quantity' => 2, 'Unit' => 'H87 - NO APLICA', 'Description' => 'Dorito', 'UnitValue' => 25, 'Total' => 50)), 'Taxes' => array(array('Total' => 8, 'Name' => 'IVA', 'Rate' => 0, 'Type' => 'transferred')), 'Complement' => array('TaxStamp' => array('Uuid' => '49ad9b85-0afd-4e78-916c-c10c40e0a102', 'Date' => '2024-03-03T11:34:37', 'CfdiSign' => 'JRcpHfVcXBlYNEUmNf2r0xBZanmodyuDjhLjTi1sld6kSrSguQCtnTq7uSFpeoY6UtnPE9Moz1l702Iqk7u8wSXnJ/c1dMoWvExwQbrlufYuCWMbTBiOmK2M/bAjN3x0tluN/WO3KKtJal08gAh1kVTebKCDC3eb5fYiAXYHGwuRwFWl6PyKKBOCqU1wGpm3L4t1rDtQ/az9YBJFrocjXQ8D0hwCxBs0vqaDP5nI7zwDS2RAIGk3qYmZx6n4szvtkVLmImaSUM5NRmSBlHVJSVKES7CHvst9EOIJQHluJkqx6toNcVyro2ToBdBOQQqmYJTL7rFl3go0Zus/W2+wAw==', 'SatCertNumber' => '30001000000500003456', 'SatSign' => 'H/dVs+8Ga4zwqCLwkqsGeV2uI9ECu8t9wM3X8Zzh2+CXuTEroPzYCkumnZVv/WGiqt5KJnwwh7K/BkH8xCbv/V5vwZAvTCIU86yGODLy+3OLdWoAPrT3reH3gD5t54X7plTu3KkDP3DDWrkwBvHcCyVY5YyHqhRGRtymd799awk8ADrtHlKcL6UNItj8Z5QU9TG5aw3WGcYRwk1QLY2cTJs8BPA+aNwtO/vnwdpqpcJbSYwB79DpujLtSjV28YFnWe0v9YrR5q2u8CN52+QBTyScEZ4114Bi4clmWnzB4T8YzRDnCHOguDULuiCe3UWX0tPaucY4zQQn+fCnLcDcmA==', 'RfcProvCertif' => 'SPR190613I52')), 'Status' => 'active', 'OriginalString' => '||4.0|71|2024-03-03T11:34:36|03|00001000000704353790|50|MXN|58.00|I|01|PUE|64320|BOHJ9409218N7|JHOAN JESUS BORGES HENRICHE|612|URE180429TM6|UNIVERSIDAD ROBOTICA ESPAÑOLA|86991|601|CP01|10101504|10000|2|H87|NO APLICA|Dorito|25|50|02|50|002|Tasa|0.160000|8|50.00|002|Tasa|0.160000|8.00|8.00||');
        $array = json_decode('{"id":27,"name":"default","url":"https:\/\/abac-2806-2f0-4060-e7d5-c3fe-a49c-e46b-cf54.ngrok-free.app\/api\/webhook\/receipt","headers":[],"payload":{"type":"receipts.update","receipts":[{"tip":0,"note":null,"order":null,"source":"point of sale","payments":[{"name":"Card","type":"NONINTEGRATEDCARD","paid_at":"2024-03-02T05:58:57.000Z","money_amount":58,"payment_details":null,"payment_type_id":"2ae7f7b2-22bf-468f-813c-70dd606a46eb"}],"store_id":"176cb35a-e21f-438a-96d8-99d1e0852a2e","surcharge":0,"total_tax":8,"created_at":"2024-03-02T05:58:58.000Z","line_items":[{"id":"9553152a-9dae-cbca-f6a3-2ab6d918516c","sku":"10000","cost":17,"price":25,"item_id":"af70ed89-4b59-41d4-8a5d-62c802fc5a49","quantity":2,"item_name":"Dorito","line_note":null,"cost_total":34,"line_taxes":[{"id":"8c1d2fdd-7796-4d76-b76c-a64c9a4403b2","name":"M\u00e9xico","rate":16,"type":"ADDED","money_amount":8}],"variant_id":"6bc1a062-3867-4382-b383-ebb89d31d75c","total_money":58,"variant_name":null,"line_discounts":[],"line_modifiers":[],"total_discount":0,"gross_total_money":50}],"refund_for":null,"updated_at":"2024-03-02T05:58:58.000Z","customer_id":null,"employee_id":"17ce6516-92ee-45ea-8823-1e7957cd9443","total_money":58,"total_taxes":[{"id":"8c1d2fdd-7796-4d76-b76c-a64c9a4403b2","name":"M\u00e9xico","rate":16,"type":"ADDED","money_amount":8}],"cancelled_at":null,"receipt_date":"2024-03-02T05:58:57.000Z","receipt_type":"SALE","dining_option":"Dine in","points_earned":0,"pos_device_id":"e26930c6-d979-4bbb-b931-ca064b91cb56","points_balance":0,"receipt_number":"1-1006","total_discount":0,"points_deducted":0,"total_discounts":[]}],"created_at":"2024-03-02T05:59:03.541Z","merchant_id":"b835e2e1-20e3-4af4-8df6-faa4ebe71adc"},"exception":null,"created_at":"2024-03-02T05:59:03.000000Z","updated_at":"2024-03-02T05:59:03.000000Z"}  ');
        $receipt = $this->ProccessReceiptPayment($array->payload);


        return response()->json([
            'success' => true,
            'message' => 'Test successful',
            'data' => $receipt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
