<?php

declare(strict_types=1);



require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

use function App\Config\registermiddleware;
use function App\Config\registerRoutes;
use App\Config\Paths;



$app = new App(Paths::SOURCE . "app/container-definitions.php");

registerRoutes($app);
registermiddleware($app);


return $app;
