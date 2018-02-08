<?php

use Illuminate\Database\Seeder;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $questions = DB::table('questions')->get()->keyBy('id');
        $answers = DB::table('answers')->get()->keyBy('id');
        $users = DB::table('users')->get();
	$dates = [
            '2018-01-01 00:00:01',
            '2018-01-05 00:00:01',
            '2018-01-23 00:00:01'        
        ];


	$responses = [];
	$answer_id = -1;
	foreach($answers as $key => $answer){
        	$answer_id = $answer->id;   
		break;    
        }
	foreach($users as $key => $user){
		foreach($dates as $date){
			foreach($questions as $keyq => $question){
                                $responses[] = [
                                      "user_id" => $user->id,
                             	      "question_id" => $question->id,
                             	      "answer_id" => $answer_id,
                        	      "created_at" => new DateTime($date)
                       		];
  			}	
		}
        }


	foreach($responses as $key => $response){

            DB::table('responses')->insert([
                  "user_id" => $response['user_id'],
                  "answer_id" => $response['answer_id'],
                  "question_id" => $response['question_id'],
                  "created_at" => $response['created_at'],
            ]);

        }

    }
}
