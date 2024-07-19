<?php 

use App\Core\Route;



Route::get("/", [\App\Controller\UserController::class]);
Route::get("/paiement", [\App\Controller\PaiementController::class]);
Route::get("/dette", [\App\Controller\DetteController::class, "index"]);

Route::post("/article", [\App\Controller\ArticleController::class,"details"]);
Route::post("/", [\App\Controller\UserController::class]);
Route::post("/add-client", [\App\Controller\UserController::class, "addClient"]);
Route::run($_SERVER["REQUEST_URI"]);

