<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\nhan_vien;
use Faker\Generator as Faker;

$factory->define(nhan_vien::class, function (Faker $faker) {
    return [
        "Ten_Nv" => $this->faker->sentence(),
        "Tuoi" => $this->faker->text(100),
        "Gioi_Tinh" => 1,
        "SDT" => $this->faker->phoneNumber(),
        "Ca_lam_viec" => 2,
        "Luong" => $this->faker->numberBetween(1, 10000)
    ];
});
