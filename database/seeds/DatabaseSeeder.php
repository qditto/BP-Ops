<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 4)->create();
        factory(App\User::class, 50)->create()->each(function ($user){
            $baseRoles = ['admin', 'manager', 'user', 'restricted'];
            $jobRoles = ['traffic coordinator', 'designer', 'adwords', 'seo', 'developer'];
            $user->assignRole(\Illuminate\Support\Arr::random($baseRoles));
            $user->assignRole(\Illuminate\Support\Arr::random($jobRoles));

        });
        factory(App\Client::class, 100)->create();
        factory(App\FieldGroup::class, 20)->create();
        factory(App\Definition::class, 200)->create()->each(function ($def){
            $def->product_categories()->attach(App\ProductCategory::all()->random()->id);
        });
        factory(App\ClientProduct::class, 150)->create();
        factory(App\CustomField::class, 300)->create()->each(function ($customField){
            $customField->client_products()->attach(App\ClientProduct::all()->random()->id);
        });


    }
}
