<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $admin = [
            "admin_id" => "123",
            "name" => "Daffa Doe",
            "username" => "daffadoe",
            "email" => "daffadoe@gmail.com",
            "password" => bcrypt("asd")
        ];

        Admin::create($admin);
    }
}
