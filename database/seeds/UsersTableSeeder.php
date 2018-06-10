<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1,
            'surname' => 'alex',
            'name' => 'alex',
            'middle_name' => 'alex',
            'email' => 'alex@gmail.com',
            'phone' => '1234567890',
            'password' => '$2y$10$FNNqfmNsobSEeMsqzz6ZqOaBKc7.kjtmdBE5knRe/VJ88OnMeaDgq', //123456
            'role' => '1',
            'sex' => 'Мужской'                       
            ],
            [
            'id' => 2,
            'surname' => 'ivan',
            'name' => 'ivan',
            'middle_name' => 'ivan',
            'email' => 'ivan@gmail.com',
            'phone' => '1234567890',
            'password' => '$2y$10$FNNqfmNsobSEeMsqzz6ZqOaBKc7.kjtmdBE5knRe/VJ88OnMeaDgq', //123456
            'role' => '2',
            'sex' => 'Мужской' 
            ],
            [
            'id' => 3,
            'surname' => 'igor',
            'name' => 'igor',
            'middle_name' => 'igor',
            'email' => 'igor@gmail.com',
            'phone' => '1234567890',
            'password' => '$2y$10$FNNqfmNsobSEeMsqzz6ZqOaBKc7.kjtmdBE5knRe/VJ88OnMeaDgq', //123456
            'role' => '3',
            'sex' => 'Мужской' 
            ],
            [
            'id' => 4,
            'surname' => 'serg',
            'name' => 'serg',
            'middle_name' => 'serg',
            'email' => 'sergey@gmail.com',
            'phone' => '1234567890',
            'password' => '$2y$10$FNNqfmNsobSEeMsqzz6ZqOaBKc7.kjtmdBE5knRe/VJ88OnMeaDgq', //123456
            'role' => '4',
            'sex' => 'Мужской' 
            ],
        ]);
    }
}