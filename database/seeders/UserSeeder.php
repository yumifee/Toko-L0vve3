<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Faker = Faker::create();
        foreach (range(1,200)as $index){
            User::create([
            'name' => $Faker->name,
            'username' => $Faker->username,
            'email' => $Faker->unique->safeEmail,
            'password' => $Faker-> password,
            'address' => $Faker-> address,
            ]);
        }
    }
}
