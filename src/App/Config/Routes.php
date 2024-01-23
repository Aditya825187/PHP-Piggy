<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AboutController};

function registerRoutes(App $app)
{
  $app->get("/phpiggy/public/", [HomeController::class, 'home']);
  $app->get("/phpiggy/public/about", [AboutController::class, 'about']);
}
