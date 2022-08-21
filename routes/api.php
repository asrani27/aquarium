<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/update/suhu={value}', [ApiController::class, 'updateSuhu']);
Route::get('/update/tinggiair={value}', [ApiController::class, 'updateTinggiair']);
