<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nguyen Nam B',
            'email' => 'namebhanufit@gmail.com',
            'password' => bcrypt('123456789'),
            'level' => '1',

        ]);
    }
}
