<?php

use Illuminate\Database\Seeder;
use lara\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory('lara\User')->create();
    }
}
