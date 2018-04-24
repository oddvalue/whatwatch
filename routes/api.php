<?php

use Illuminate\Http\Request;
use App\Http\Resources\Movies;
use App\Movies\MovieRepository;

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


Route::get('/', function(Request $request, MovieRepository $repo) {
    $movies = $repo->upcoming($request->get('page'));
    return new Movies($movies);
});
