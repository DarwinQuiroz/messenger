<?php

use Faker\Generator as Faker;

$factory->define(App\Conversation::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
    	'contact_id' => $faker->numberBetween(51, 100),
    	'last_message' => null,
    	'last_time' => null
    	// 'listen_notifications' => ,
    	// 'has_blocked' =>
    ];
});
