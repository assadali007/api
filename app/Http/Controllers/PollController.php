<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Resources\PollCollection;
use App\Http\Resources\PollResource;
use Illuminate\Support\Facades\Validator;


class PollController extends Controller
{
    public function index()
    {
        return response()->json(new PollCollection(Poll::all()),200);
    }



    public function show($id)
    {
        $poll = Poll::find($id);
        if(is_null($poll))
        {
            return response()->json($poll,404);
        }
        else
        {
            //returning nested data
            $poll = Poll::with('questions')->findOrFail($id);
              return response()->json(new PollResource($poll),200);

        }
    
    //    return response()->json(new PollResource(Poll::findOrFail($id)),200);

    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:10',
            
        ]);
        if($validator->fails()){
         return response()->json($validator->errors(),400);

        }
       $poll = Poll::create($request->all());
       //this tell the json to create new poll
          return response()->json($poll,201);
    }



    // first is the request object 
    // and second the instances of poll object  laravel populate the id in the url
    public function update(Request $request,Poll $poll)
    {
       $poll->update($request->all());
       return response()->json(new PollResource($poll),200);
    }


    public function delete(Poll $poll)
    {
        $poll->delete();
        return response()->json(null,204);
    }
    public function errors()
    {
        // http status code is the error code
        return response()->json(['msg'=>'payment is required'],501);
    }

    public function questions(Request $request, Poll $poll)
    {
        //poll model have abilty to access to sub resource 
        $questions = $poll->questions;
        return response()->json($questions,200);
        
    }
}
