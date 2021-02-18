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
Route::apiResource('construction_progress', 'App\Http\Controllers\ConstructionProgressController');
Route::apiResource('construction_progress_gallery', 'App\Http\Controllers\ConstructionProgressGalleryController');
Route::apiResource('residential_complex_houses', 'App\Http\Controllers\ResidentialComplexHousesController');
Route::apiResource('residential_complex_house_descriptions', 'App\Http\Controllers\ResidentialComplexHouseDescriptionsController');
