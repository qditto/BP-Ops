<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\CustomField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientProduct;
class ClientProductController extends Controller
{
    public function edit(ClientProduct $clientProduct)
    {

        $formattedData = $clientProduct->getCustomFields();
        return response()->json($formattedData,200);
    }

    public function updateCustomFields(ClientProduct $clientProduct, Request $request)
    {
        $res = $request->toArray();
        foreach ($res as $field_group) {
            foreach ($field_group as $field) {
                if($field['type'] == 'json' && $field['value']){
                    $field['value'] = json_encode($field['value']);
                }
                if($field['id']){
                   $cf = CustomField::where('id', $field['id'])->first();
                   $cf->update(['value' =>$field['value']]);
                }else{
                    $cf = new CustomField();
                    $cf->definition_id = $field['def_id'];
                    $cf->value = $field['value'];
                    $cf->save();
                    $cf->client_products()->attach($clientProduct);
                }
            }
        }
        dd($request->toArray());
    }
}
