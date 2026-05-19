<?php

use App\Http\Controllers\WebhookController;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Routes::post('/webhook/cms', [WebhookController::class, 'handle']);