<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $clint = DB::table('users')->where('name','clint')->first();
        // dd($clint);

	$copy = [0=>"How are you today?", 1=> "How was the coffee?", 2=>"How is the Weather today?", 3=> "How is the MTA running today?"];
	$slug = [0=>"Yourself?", 1=> "Coffee?", 2=>"Weather?", 3=> "MTA?"];
	for ($i=0; $i<4; $i++) {
	    DB::table('questions')->insert([
		'copy' => $copy[$i],
                'slug' => $slug[$i]
	    ]);
	}        

    }
}
