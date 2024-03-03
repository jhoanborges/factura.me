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

        $data = array('Id' => 'tn1C8tgGJBQNXSiPlnYveg2', 'CfdiType' => 'ingreso', 'Type' => 'I - ingreso', 'Serie' => '', 'Folio' => '71', 'Date' => '2024-03-03T11:34:36', 'CertNumber' => '00001000000704353790', 'PaymentTerms' => '03 - Transferencia electrónica de fondos', 'PaymentMethod' => 'PUE - Pago en una sola exhibición', 'PaymentAccountNumber' => '', 'PaymentBankName' => '', 'ExpeditionPlace' => '64320', 'ExchangeRate' => 0, 'Currency' => 'MXN - Peso Mexicano', 'Subtotal' => 50, 'Discount' => 0, 'Total' => 58, 'Observations' => '', 'OrderNumber' => '1-1006', 'Issuer' => array('FiscalRegime' => '612 - Personas Físicas con Actividades Empresariales y Profesionales', 'Rfc' => 'BOHJ9409218N7', 'TaxName' => 'JHOAN JESUS BORGES HENRICHE', 'Email' => 'jhoan.borges@hexagun.mx', 'Phone' => '8116168792', 'TaxAddress' => array('Street' => 'Tuxpan', 'ExteriorNumber' => '706A', 'InteriorNumber' => '', 'Neighborhood' => 'Mitras Norte', 'ZipCode' => '64320', 'Municipality' => 'Monterrey', 'State' => 'NUEVO LEON', 'Country' => 'México'), 'IssuedIn' => array('Street' => '', 'ExteriorNumber' => '', 'Neighborhood' => '-', 'ZipCode' => '64320', 'Municipality' => '', 'State' => '', 'Country' => 'MEXICO')), 'Receiver' => array('Rfc' => 'URE180429TM6', 'Name' => 'UNIVERSIDAD ROBOTICA ESPAÑOLA', 'Email' => ''), 'Items' => array(array('ProductCode' => '10101504', 'IdentificationNumber' => '10000', 'UnitCode' => 'H87', 'Discount' => 0, 'CuentaPredial' => '', 'Quantity' => 2, 'Unit' => 'H87 - NO APLICA', 'Description' => 'Dorito', 'UnitValue' => 25, 'Total' => 50)), 'Taxes' => array(array('Total' => 8, 'Name' => 'IVA', 'Rate' => 0, 'Type' => 'transferred')), 'Complement' => array('TaxStamp' => array('Uuid' => '49ad9b85-0afd-4e78-916c-c10c40e0a102', 'Date' => '2024-03-03T11:34:37', 'CfdiSign' => 'JRcpHfVcXBlYNEUmNf2r0xBZanmodyuDjhLjTi1sld6kSrSguQCtnTq7uSFpeoY6UtnPE9Moz1l702Iqk7u8wSXnJ/c1dMoWvExwQbrlufYuCWMbTBiOmK2M/bAjN3x0tluN/WO3KKtJal08gAh1kVTebKCDC3eb5fYiAXYHGwuRwFWl6PyKKBOCqU1wGpm3L4t1rDtQ/az9YBJFrocjXQ8D0hwCxBs0vqaDP5nI7zwDS2RAIGk3qYmZx6n4szvtkVLmImaSUM5NRmSBlHVJSVKES7CHvst9EOIJQHluJkqx6toNcVyro2ToBdBOQQqmYJTL7rFl3go0Zus/W2+wAw==', 'SatCertNumber' => '30001000000500003456', 'SatSign' => 'H/dVs+8Ga4zwqCLwkqsGeV2uI9ECu8t9wM3X8Zzh2+CXuTEroPzYCkumnZVv/WGiqt5KJnwwh7K/BkH8xCbv/V5vwZAvTCIU86yGODLy+3OLdWoAPrT3reH3gD5t54X7plTu3KkDP3DDWrkwBvHcCyVY5YyHqhRGRtymd799awk8ADrtHlKcL6UNItj8Z5QU9TG5aw3WGcYRwk1QLY2cTJs8BPA+aNwtO/vnwdpqpcJbSYwB79DpujLtSjV28YFnWe0v9YrR5q2u8CN52+QBTyScEZ4114Bi4clmWnzB4T8YzRDnCHOguDULuiCe3UWX0tPaucY4zQQn+fCnLcDcmA==', 'RfcProvCertif' => 'SPR190613I52')), 'Status' => 'active', 'OriginalString' => '||4.0|71|2024-03-03T11:34:36|03|00001000000704353790|50|MXN|58.00|I|01|PUE|64320|BOHJ9409218N7|JHOAN JESUS BORGES HENRICHE|612|URE180429TM6|UNIVERSIDAD ROBOTICA ESPAÑOLA|86991|601|CP01|10101504|10000|2|H87|NO APLICA|Dorito|25|50|02|50|002|Tasa|0.160000|8|50.00|002|Tasa|0.160000|8.00|8.00||');

        $receipt = $this->ProccessReceiptPayment($data);


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
