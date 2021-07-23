<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;
use App\Http\Resources\PetitionResource;
use App\Http\Resources\PetitionCollection;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     The create and edit methods are not used in an API controller
     because these are usually used to return a view with the form to create or edit data on the front end.
     */

    public function index()
    {
        /* When the user requests a petition, we get the data from the database,
        pass it through this template that we defined in the PetitionResource.php file, 
         and this is what's going to be returned to the user */

         $petition = Petition::all();

       //  return PetitionResource::collection($petition);
       //  return  new PetitionCollection($petition);
          return response()->json(new PetitionCollection($petition),200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petition = Petition::create($request->only([

            'title','description','category','author','signees'

        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function show(Petition $petition)
    {

        return new PetitionResource($petition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petition $petition)
    {
       $petition->update($request->only([
         'title','description','category','author','signees'
       ]));

       return new PetitionResource($petition);
       }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petition $petition)
    {
        $petition->delete();
        //first parameter is null because we are not returing anything 
        return response()->json(null,204);
    }
}