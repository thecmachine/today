<?php

namespace App\Http\Controllers;

use App\Response;
use App\Question;
use App\Answer;
use DB;
use Illuminate\Http\Request;
use DateTime;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 /**
     * save response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
       $id = \Auth::user()->id;
       $responses = $request->get('response');
       
       foreach($responses as $key => $response){
	   DB::table('responses')->insert([
               "question_id" => $response['question_id'],
               "answer_id" => $response['answer_id'],
               "user_id" => $id 
           ]);
       }

       $all = DB::table('responses')->where('user_id', $id)->get();
       return "complete";
    }

/**
     * Get All
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $id = \Auth::user()->id;
        $responses = Response::where('user_id',$id)->orderBy('created_at','desc')->get();
        $questions = Question::all()->keyBy('id');
        $answers = Answer::all()->keyBy('id');
        $days = array();
	foreach($responses as $key => $response){
            $date = new DateTime($response->created_at);
            $prettyDate = $date->format('Y-m-d H:i:s');
            if(!array_key_exists($prettyDate, $days)){
	        $days[$prettyDate] = array();
            }
            foreach($questions as $question){

                if(!array_key_exists( $question->id, $days[$prettyDate]) && $question->id == $response->question_id ){
                     $days[$prettyDate][ $question->id] = $response->answer_id;
                }
	    }
        }

	return array("questions" => $questions, "answers" => $answers, "days" => $days);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
