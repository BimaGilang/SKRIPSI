<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'level' => 1,
                'email' => 'saleproject_admin@gmail.com'
            ],
            [
                'name' => 'Kasir',
                'username' => 'Kasir',
                'password' => bcrypt('kasir123'),
                'level' => 2,
                'email' => 'saleproject_kasir@gmail.com'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
