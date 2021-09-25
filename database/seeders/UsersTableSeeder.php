<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jose Bryan',
            'email' => 'bryan.jbsj@gmail.com',
            'password' => bcrypt('12345678'), // password
            'cedula'=> '12093475',
            'address' => 'Calle 5',
            'phone'=> '5586199940',
            'role'=> 'admin'
        ]);
        User::factory(10)->create();

        
    }
}
