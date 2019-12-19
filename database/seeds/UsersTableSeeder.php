<?php

use Store\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                /*'id'             => 1,*/
                'name'           => 'Admin',
                'surname'        => 'Admin',
                'email'          => 'admin@store.me',
                'password'       => 'adminadmin',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
