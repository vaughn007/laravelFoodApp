<?php

use Illuminate\Database\Seeder;

// import the user model
use App\User;
// we want to set our own different password here. So to do so, we can import the hash facade.
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //we will create a new user instance and assign it to a variable
        $admin = new User([
            'name' => 'vaughn',
            'email' => 'vaughnwatson9@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test 123'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        //save to database
        $admin->save();

    }
}
