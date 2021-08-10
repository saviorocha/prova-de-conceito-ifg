<?php

use App\Http\Controllers\Api\Administracao\Cadastro\Candidato\CandidatoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(['prefix' => 'cadastro'], function () {
    Route::resource('candidato', CandidatoController::class);
});
