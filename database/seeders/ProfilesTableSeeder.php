<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        Profile::create([
            'user_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'age' => 30,
            'gender' => 'Male',
            'email' => 'john.doe@example.com',
            'phone_number' => '555-0100',
        ]);

        Profile::create([
            'user_id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'age' => 28,
            'gender' => 'Female',
            'email' => 'jane.smith@example.com',
            'phone_number' => '555-0101',
        ]);
    }
}


