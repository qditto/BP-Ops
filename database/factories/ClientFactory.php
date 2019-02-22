<?php

use Faker\Generator as Faker;
use Faker\Provider\Address;

$factory->define(App\Client::class, function (Faker $faker) {
    $comp = array(
        array('name' => $faker->company, 'url' => $faker->url),
        array('name' => $faker->company, 'url' => $faker->url),
        array('name' => $faker->company, 'url' => $faker->url),
        array('name' => $faker->company, 'url' => $faker->url),

    );

    return [
        'name' => $faker->name,
        'current_url' => $faker->url,
        'objectives' => $faker->paragraph,
        'email' => $faker->email,
        'difference' => $faker->paragraph,
        'keywords' => $faker->words(),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => Address::postcode(),
        'phone' => $faker->phoneNumber,
        'geo_targeting' => $faker->words(),
        'competitors' => $comp,
        'contact_method' => $faker->word,
        'ga_ua_code' => $faker->word,
        'notes' => $faker->paragraph,
        'contact_name' => $faker->name,
        'contact_email' => $faker->email,
        'contact_number' => $faker->phoneNumber,
        'contact_number_2' => $faker->phoneNumber,
        'google_tag_manager_access' => $faker->boolean
    ];
});
