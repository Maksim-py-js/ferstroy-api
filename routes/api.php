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
Route::apiResource('residential_complexes', 'App\Http\Controllers\ResidentialComplexesController');
Route::apiResource('features_residential_complexes', 'App\Http\Controllers\FeaturesResidentialComplexesController');
Route::apiResource('features_appartments', 'App\Http\Controllers\FeaturesAppartmentsController');
Route::apiResource('gallery_residential_complexes', 'App\Http\Controllers\GalleryResidentialComplexesController');
