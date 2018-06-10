<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'title' => 'title',
            'logo' => 'default_logo.jpg',
            'address' => 'address',
            'phone' => '1234567890',
        ]);
    }
}
