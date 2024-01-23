<?php

declare(strict_types=1);

namespace App;

use Framework\Templateengine;
use App\Config\Paths;

return [
  Templateengine::class => fn () => new Templateengine(Paths::VIEW)
];
