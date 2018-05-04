<?php

use Faker\Generator as Faker;

$factory->define(App\Contato::class, function (Faker $faker) {
    $nome = $faker->firstName;
    $sobrenome = $faker->lastName;
    $email = strtolower($nome.'.'.$sobrenome).'@'.$faker->domainName;
    return [
        'nome'      => $nome.' '.$sobrenome,
        'telefone'  => $faker->phoneNumber,
        'email'     => $email,
    ];
});
