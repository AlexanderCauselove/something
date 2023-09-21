<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Controller::class, "main"])->name("main");

Route::group(["middleware" => "unauthorized"], function () {
    Route::match(
        ["get", "post"],
        "/users/login",
        [\App\Http\Controllers\Controller::class, "login"]
    )->name("login");

    Route::match(["get", "post"],
        "/users/register",
        [\App\Http\Controllers\Controller::class, "register"]
    )->name("register");
});

Route::group(["middleware" => "authorized"], function () {
    Route::get("users/logout", [\App\Http\Controllers\Controller::class, "logout"])->name("logout");

    Route::get("bots", [\App\Http\Controllers\Controller::class, "bots"])->name("bots");
    Route::get("/bots/start/{id}", [\App\Http\Controllers\Controller::class, "startBot"])->name("startBot");
    Route::get("/bots/stop/{id}", [\App\Http\Controllers\Controller::class, "stopBot"])->name("stopBot");
    Route::get("/bots/create/{id}/{name}", [\App\Http\Controllers\Controller::class, "createBot"])->name("createBot");
    Route::get("/bots/delete/{id}", [\App\Http\Controllers\Controller::class, "deleteBot"])->name("deleteBot");

    Route::get("/clients", [\App\Http\Controllers\Controller::class, "clients"])->name("clients");
    Route::get("/actions", [\App\Http\Controllers\Controller::class, "actions"])->name("actions");
});
