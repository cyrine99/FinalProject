<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $faker=Faker::create();

        $a=0;
        foreach (range(1,10) as $item)//حدد عدد الصفوف الي تبيها في الfor
        {
            $a++;
            //الكلاس faker يوفر هلبا خيارات للبيانات و تختار حسب ما تريد اسم او ايميل او رقم
            DB::table('admin_models')->insert([
                'firstname'=>$faker->text(15),
                'lastname'=>$faker->text(15),
                'employeeId'=>12345678+$a,
                'email'=>$faker->email,
                'userType'=>1,
                'password'=>'$2y$10$72J8A7HOLuvNWljxh0eRZOAqjOCQCELxAGvyKGH7rz8MxBqGOIK82'
            ]);
        }
    }
}
