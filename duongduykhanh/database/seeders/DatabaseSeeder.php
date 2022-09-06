<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create(); 
        DB::table('duongduykhanhcustomers')->insert([
            [
                'customerName'=>'DuongDuyKhanh',
                'address'=>'abc',
                'phone'=>'0833005455',
                'email'=>'duongduykhanhcntt@gmail.com',
                'password'=> bcrypt('12345'),
            ]
        ]);
    }
}
