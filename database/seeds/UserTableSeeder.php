<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mauro',
            'lastName' => 'Yini',
            'telephone' => '2235769157',
            'code_id' => '1',
            'email' => 'mauroyini@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
