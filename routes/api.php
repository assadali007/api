<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\QuestionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/petitions',PetitionController::class);
//if we need only two action or three you should use this
/*
Route::resource('/petitions', PetitionController::class)->only([
    'index', 'store'
]);
*/
Route::resource('/authors',AuthorController::class)->only([
    'index','show'

]);

Route::get('test', function () {
    // return "hello world of pakistan";
    return response('Hello world',200);
 });
Route::get('polls',[PollController::class,'index']);
Route::get('polls/{id}',[PollController::class,'show']);
Route::post('polls',[PollController::class,'store']);

// This uses the ID passed in to identify the poll with that particular primary key.
// And if that poll isn't found, it returns an automatic 404
Route::put('polls/{poll}',[PollController::class,'update']);
Route::delete('polls/{poll}',[PollController::class,'delete']);
Route::any('errors',[PollController::class,'errors']);

Route::apiResource('questions',QuestionsController::class);
Route::get('polls/{poll}/questions',[PollController::class,'questions']);
Route::get('files/get',[FilesController::class,'show']);
Route::post('files/create',[FilesController::class,'create']);