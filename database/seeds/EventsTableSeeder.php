<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $time = 0;
        $description = [
            'Задача организации, в особенности же начало повседневной работы по формированию позиции способствует 
            подготовки и реализации системы обучения кадров, соответствует насущным потребностям. Разнообразный и 
            богатый опыт консультация с широким активом обеспечивает широкому кругу (специалистов) участие в 
            формировании модели развития.',
            'Таким образом постоянный количественный рост и сфера нашей активности требуют определения и уточнения 
            направлений прогрессивного развития.',
            'Повседневная практика показывает, что рамки и место обучения кадров обеспечивает широкому кругу 
            (специалистов) участие в формировании направлений прогрессивного развития. Равным образом консультация 
            с широким активом в значительной степени обуславливает создание дальнейших направлений развития. 
            Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности требуют определения и уточнения 
            направлений прогрессивного развития.',
            'Товарищи! рамки и место обучения кадров позволяет выполнять важные задания по разработке позиций, 
            занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, 
            что сложившаяся структура организации играет важную роль в формировании позиций, занимаемых участниками в 
            отношении поставленных задач.',
            'Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности 
            способствует подготовки и реализации дальнейших направлений развития. Повседневная практика показывает, 
            что сложившаяся структура организации позволяет выполнять важные задания по разработке системы 
            обучения кадров, соответствует насущным потребностям.',
            'Идейные соображения высшего порядка, а также сложившаяся структура организации позволяет выполнять важные 
            задания по разработке модели развития. Не следует, однако забывать, что дальнейшее развитие различных форм 
            деятельности обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия.'
        ];
        $title = 'Равным образом постоянный количественный рост и сфера нашей активности играет важную роль в формировании
                    системы обучения кадров, соответствует насущным потребностям. Задача организации, в особенности же
                    дальнейшее развитие различных форм деятельности требуют определения и уточнения дальнейших направлений 
                    развития С другой стороны новая модель организационной деятельности в значительной степени обуславливает 
                    создание позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько 
                    очевидна, что консультация с широким активом влечет за собой процесс внедрения и модернизации дальнейших 
                    направлений развития. Таким образом реализация намеченных плановых заданий влечет за собой процесс внедрения
                    и модернизации позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности
                    же реализация намеченных плановых заданий позволяет оценить значение соответствующий условий активизации
                    Не следует, однако забывать, что начало повседневной работы по формированию позиции позволяет выполнять 
                    важные задания по разработке направлений прогрессивного развития Разнообразный и богатый опыт дальнейшее 
                    развитие различных форм деятельности позволяет оценить значение систем массового участия';
        $title = preg_split('/[\s,]+/', mb_strtolower($title));
        function content($arr) {
            $quantity = rand(2, 5);
            $exitContent = '';
            for ($i=0; $i<=$quantity; $i++) {
                $exitContent .= $arr[array_rand($arr, 1)].PHP_EOL;
            }
            return $exitContent;
        }
        function title($arr) {
            $quantity = rand(3, 8);
            $exitContent = '';
            for ($i=0; $i<=$quantity; $i++) {
                $exitContent .= $arr[array_rand($arr, 1)].' ';
            }
            return $exitContent;
        }
        for ($i = 0; $i < 20; $i++) {
            $time += 5000;
            shuffle($title);
            $data[] = [
                'title' => title_case(title($title)),
                'user_id' => 1,
                'content' => content($description),
                'event_date' => date('Y-m-d h:i:s', time()+$time),
                'created_at' => date('Y-m-d h:i:s', time()+$time),
                'description' => 'description',
                'event_hours' => 'even_hours',
            ];
        }
        DB::table('events')->insert($data);
    }
}
