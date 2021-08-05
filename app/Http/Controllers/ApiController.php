<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class ApiController extends Controller
{
    //
        
    public function fedex(){
     


        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'postmen-api-key' => '5a4262c5-a53a-4e09-bd0c-0e6ab1f01b48'
        ])->post('https://sandbox-api.postmen.com/v3/rates', [
            'async' => false,
            'shipper_accounts' => 
            array (
              0 => 
              array (
                'id' => 'de5a647c-d13c-4f97-ac2d-3c9f5970d918',
              ),
            ),
            'is_document' => false,
            'shipment' => 
            array (
              'ship_from' => 
              array (
                'contact_name' => 'Thomas',
                'company_name' => 'Thomas ',
                'street1' => '1202 Chalet Ln',
                'country' => 'USA',
                'type' => 'business',
                'postal_code' => '72601',
                'city' => 'Harrison',
                'phone' => '085624282247',
                'street2' => 'Do Not Delete - Test Account',
                'tax_id' => NULL,
                'street3' => NULL,
                'state' => 'AR',
                'email' => 'thomas@mail.com',
                'fax' => '085624282247',
              ),
              'ship_to' => 
              array (
                'contact_name' => 'Dr. Moises Corwin',
                'phone' => '1-140-225-6410',
                'email' => 'Giovanna42@yahoo.com',
                'street1' => '28292 Daugherty Orchard',
                'city' => 'Beverly Hills',
                'postal_code' => '90209',
                'state' => 'CA',
                'country' => 'USA',
                'type' => 'residential',
              ),
              'parcels' => 
              array (
                0 => 
                array (
                  'description' => 'Food XS',
                  'box_type' => 'custom',
                  'weight' => 
                  array (
                    'value' => 2,
                    'unit' => 'kg',
                  ),
                  'dimension' => 
                  array (
                    'width' => 20,
                    'height' => 40,
                    'depth' => 40,
                    'unit' => 'cm',
                  ),
                  'items' => 
                  array (
                    0 => 
                    array (
                      'description' => 'Food Bar',
                      'origin_country' => 'USA',
                      'quantity' => 2,
                      'price' => 
                      array (
                        'amount' => 3,
                        'currency' => 'USD',
                      ),
                      'weight' => 
                      array (
                        'value' => 0.6,
                        'unit' => 'kg',
                      ),
                      'sku' => 'imac2014',
                    ),
                  ),
                ),
              ),
            ) 
        ]);
        dd($response->body());
  
             
    }

}
