<?php

declare(strict_types=1);

namespace App;

use Framework\Templateengine;
use App\Config\Paths;
use App\Services\ValidatorService;

return [
  Templateengine::class => fn () => new Templateengine(Paths::VIEW),
  ValidatorService::class => fn () => new ValidatorService()
];
