<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * thêm dữ liệu vào bảng
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert(
            [
                ['name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('123456789'),
                'typeuser'=>'admin'],
                ['name'=>'phuc','email'=>'phuc@gmail.com','password'=>bcrypt('123456789'),
                'typeuser'=>'user']
            ]
        );
    }
}
