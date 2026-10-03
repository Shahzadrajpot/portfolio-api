<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;

// Handle CORS preflight for all API routes
Route::options('{any}', function (Request $request) {
    // Return a small non-empty body so some servers don't coerce to 204
    return response('OK', 200, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type,Authorization,X-Requested-With',
        'Content-Type' => 'text/plain',
    ]);
})->where('any', '.*');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([\App\Http\Middleware\Cors::class])->group(function () {
    Route::post('/contact-messages', [ContactMessageController::class, 'store']);
});
