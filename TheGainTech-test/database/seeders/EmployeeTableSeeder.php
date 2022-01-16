<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->delete();

        $employeeRecords =[
        	['id'=>1,'name'=>'Md Kamal Hossain','email'=>'kamalhossain@gmail.com','address'=>'Nikunja-2,Khilkhet,Dhaka-1201','phone'=>'+8801838322523']
        ];

        DB::table('employees')->insert($employeeRecords);
    }
}
