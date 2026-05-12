<?php

use App\Http\Controllers\WebhookController;
Route::post('/webhook/cms', [WebhookController::class, 'handle']);