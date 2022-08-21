<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/update/suhu={id}', [ApiController::class, 'updateSuhu']);
Route::get('/update/tinggiair={id}', [ApiController::class, 'updateSuhu']);