<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$H5Sr3VkelKqjXPbrBbVyd.rQdNZSpw0GdcP7uoNreelWINI772Ky6', // 12345678
        'remember_token' => Str::random(10),
    ];
});
