<?php

use Illuminate\Database\Seeder;

class StudentClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $letters = ['А', 'Б', 'В', 'Г'];
        for ($i = 1; $i <= 11; $i++) {
            foreach ($letters as $letter) {
                $data[] = [
                    'letter_class' => $letter,
                    'start_year' => 2018 - $i,
                    'year_of_issue' => 2018 - $i + 11,
                    'fourth_class' => 1
                ];
            }
        }
        DB::table('studentClass')->insert($data);
    }
}
