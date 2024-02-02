<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middlewares\{FlashMiddleware, TemplateDataMiddleware, ValidationExceptionMiddleware, SessionMiddleware};

function registermiddleware(App $app)
{
  $app->addMiddleware(TemplateDataMiddleware::class);
  $app->addMiddleware(FlashMiddleware::class);
  $app->addMiddleware(SessionMiddleware::class);
  $app->addMiddleware(ValidationExceptionMiddleware::class);
}
