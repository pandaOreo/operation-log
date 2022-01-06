<?php

use Oreo\OperationLog\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('auth/operation-logs', Controllers\OperationLogController::class . '@index')->name('oreo.operation-logs.index');
Route::delete('auth/operation-logs/{id}', Controllers\OperationLogController::class . '@destroy')->name('oreo.operation-logs.destroy');
