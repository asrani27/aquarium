<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/update/suhu={value}', [ApiController::class, 'updateSuhu']);
Route::get('/update/tinggiair={value}', [ApiController::class, 'updateTinggiair']);
Route::get('/data/lampu', [ApiController::class, 'lampu']);
Route::get('/data/kipas', [ApiController::class, 'kipas']);
Route::get('/data/pakan', [ApiController::class, 'pakan']);