<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conversation;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid()
    ];
});
