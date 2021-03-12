<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

\CloudCreativity\LaravelJsonApi\Facades\JsonApi::register('default')->routes(function ($api) {
    $api->resource('movies')->relationships(function ($relations) {
        $relations->hasMany('images');
        $relations->hasMany('actors');
    });
    $api->resource('actors')->relationships(function ($relations) {
        $relations->hasOne('movie');
    });
    $api->resource('images')->relationships(function ($relations) {
        $relations->hasOne('movie');
    });
});
