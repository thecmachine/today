<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [0=>"Terrible!", 1=> "Bad", 2=>"OK", 3=> "Good", 4=>"Incredible!"];
        for ($i=0; $i<5; $i++) {
            DB::table('answers')->insert([
                'copy' => $answers[$i]
            ]);
        }

    }
}
