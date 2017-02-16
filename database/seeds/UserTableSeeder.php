<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::truncate();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')

        ]);

        foreach(range(1, 20) as $i) {

            User::create([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('123456')
            ]);
        }


    }
}
