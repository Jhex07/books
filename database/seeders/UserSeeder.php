<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        $user = new User([
            'number_id' => '1193099858',
            'name' => 'Jhon',
            'last_name' => 'Montes',
            'email' => 'jhonalejandro25montes@gmail.com',
            'password' => '123456789',
            'remember_token' => Str::random(10),
        ]);
        $user->save();
        $user->assignRole('admin');
    }
}
