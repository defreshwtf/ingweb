<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Administrador;

class administradorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "admin1",
            'email' => "admin1@email.com",
            'password' => Hash::make("admin1"),
        ]);

        Administrador::create([
            "idUser" => $user->id
        ]);
    }
}
