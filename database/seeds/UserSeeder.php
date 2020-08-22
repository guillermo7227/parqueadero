<?php

use App\User;
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
        User::create([
            'name' => 'Usuario Administrador',
            'password' =>bcrypt('secret'),
            'email' => 'admin@cuatroruedas.com',
        ]);
    }
}
