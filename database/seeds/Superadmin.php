<?php

use Illuminate\Database\Seeder;

class Superadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'superadmin',
            'password' => bcrypt('123321'),
        ]);
    }
}
