<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i < 30; $i++){
	        DB::table('collect')->insert([
	        	'uid'=>2,
	        	'mname'=>str_random(8),
	        	'sname'=>str_random(4),
	        	'aname'=>str_random(8),
                'status'=>1
	        	

        ]);
	        
	    }
    }
}
