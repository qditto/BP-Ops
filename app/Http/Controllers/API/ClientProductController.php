<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\CustomField;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientProduct;
class ClientProductController extends Controller
{
    public function index(Client $client)
    {
        $clientProducts = $client->where('id', $client->id)->with('client_products.product.product_category')->get();
        $clientProducts = $clientProducts->pluck('client_products')->flatten()->pluck( 'product', 'id');
        $products = \App\ProductCategory::with('products')->get();
        $data = ['client_products' => $clientProducts, 'products' => $products];
        return response()->json($data);
    }
    public function edit(ClientProduct $clientProduct)
    {

        $formattedData = $clientProduct->getCustomFields();
        return response()->json($formattedData,200);
    }

    public function attachProduct(Client $client, Request $request)
    {
        $product = Product::find($request->id);
        $clientProduct = new ClientProduct();
        $clientProduct->client_id = $client->id;
        $clientProduct->product_id = $request->id;
        $clientProduct->save();
        return response()->json('',200);
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
