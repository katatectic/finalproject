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
        $data = [];
        $surnames = ['Смирнов', 'Иванов', ' Кузнецов', ' Соколов', 'Попов', 'Лебедев', 'Козлов', 'Новиков', ' Морозов',
            'Петров', 'Волков', 'Соловьёв', 'Васильев'];
        $names = ['Пётр', 'Гарри', 'Геннадий', 'Генри', 'Генрих', 'Георгий', 'Герасим', 'Герман', 'Германн', 'Глеб'];
        $middleNames = ['Вадимович', 'Викторович', 'Давидович', 'Лаврентьевич', 'Олегович', 'Святославович',
            'Эдуардович', 'Яковлевич', 'Николаевич', 'Иосифович'];
        $data[] = [
            'surname' => 'admin',
            'name' => 'admin',
            'middle_name' => 'admin',
            'email' => 'admin@admin.ru',
            'phone' => '8050'.rand(1000000, 9999999),
            'password' => '$2y$10$QT0vDEoeWtScNVfmBLJUC.hhCABVDIpGsZ6pCmxrTCKVvBL7J3Lcm', //qwerty
            'role' => 1,
            'appointment' => 'admin',
            'your_child' => 'child-0',
            'created_at' => date('Y-m-d', time())
        ];
        for ($i = 0; $i < 10; $i++) {
            shuffle($surnames);
            shuffle($names);
            shuffle($middleNames);
            $data[] = [
                'surname' => $surnames[0],
                'name' => $names[0],
                'middle_name' => $middleNames[0],
                'email' => $i.'email@email.it',
                'phone' => '8095'.rand(1000000, 9999999),
                'appointment' => 'нет',
                'password' => '$2y$10$QT0vDEoeWtScNVfmBLJUC.hhCABVDIpGsZ6pCmxrTCKVvBL7J3Lcm', //qwerty
                'role' => 4,
                'your_child' => 'child-'.$i,
                'created_at'=>date('Y-m-d', time())
            ];
        }
        DB::table('users')->insert($data);
    }
}
