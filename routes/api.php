<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::Post('/webhook/cms', [WebhookController::class, 'handle']);