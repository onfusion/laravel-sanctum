<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Loop here to insert recorde into DB
        foreach(range(1, 5) as $value) {
            DB::table('employees') -> insert([
                'name' => $faker -> name(),
                // 'email' => $faker -> safeEmail(),
                'email' => preg_replace('/@example\..*/', '@gamil.com', $faker -> unique() -> safeEmail),
                'mobile' => $faker -> phoneNumber,
                'gender' => $faker -> randomElement(['male', 'female', 'others']),
                'age' => $faker -> numberBetween(22, 40),
                'city' => $faker -> city(),
                'state' => $faker -> state(),
                'address' => $faker -> address(),
            ]);
        }
    }
}
