<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(['name'=>'Jeremy', 'lastname' => 'Guzman', 'username' => 'Jeranguz', 'email' => 'JeremyGD997@hotmail.com', 'password' => 12345678, 'profile_picture' => 'placeholder-image.webp', 'user_types_id' => 1,]);
        User::create(['name'=>'Francisco', 'lastname' => 'Sequira', 'username' => 'Francis69', 'email' => 'Francis@hotmail.com', 'password' => 12345678, 'profile_picture' => 'placeholder-image.webp', 'user_types_id' => 2,]);
        User::create(['name'=>'Eddy', 'lastname' => 'Chaves', 'username' => 'Eddy45', 'email' => 'Eddy@hotmail.com', 'password' => 12345678, 'profile_picture' => 'placeholder-image.webp', 'user_types_id' => 3,]);
        User::create(['name'=>'Justin', 'lastname' => 'Guzman', 'username' => 'Justin20', 'email' => 'Justin@hotmail.com', 'password' => 12345678, 'profile_picture' => 'placeholder-image.webp', 'user_types_id' => 1,]);
        User::create(['name'=>'John', 'lastname' => 'Doe', 'username' => 'John_D', 'email' => 'John@hotmail.com', 'password' => 12345678, 'profile_picture' => 'placeholder-image.webp', 'user_types_id' => 2,]);
    }
}
