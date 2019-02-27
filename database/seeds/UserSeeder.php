<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 50; $i++) { 
            
        
            DB::table('user')->insert([
                'username' => str_random(10),
                'password' => Hash::make(12345678),
                'email' => str_random(10).'@gmail.com',
                'phone' => '13901234567',
                'profile'=>'/uploads/15378464907741.png',
                'status'=>'1'
            ]);

        }
    }
}
