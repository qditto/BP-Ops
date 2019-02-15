<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use League\Csv\Reader;

class LoadProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $csv = Reader::createFromPath(storage_path('docs/product_groups.csv'));
        $records = $csv->getRecords();
        foreach ($records as $record) {
            $productCategory = new \App\ProductCategory();
            $productCategory->name = $record[0];
            $productCategory->save();
        }
        $csv = Reader::createFromPath(storage_path('docs/products.csv'));
        $records = $csv->getRecords();
        foreach ($records as $record) {
            $product = new \App\Product();
            $product->product_category_id = $record[0];
            $product->name = $record[1];
            $product->spend =  $record[2];
            $product->details = $record[3];
            $product->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
