<?php

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Customer::truncate();

        foreach(range(1, 25) as $i) {
            Customer::create([
                'company' => $faker->company,
                'email' => $faker->email,
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }
    }
}
