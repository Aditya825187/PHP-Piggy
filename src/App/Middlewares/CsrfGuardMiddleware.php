<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;

class CsrfGuardMiddleware implements MiddlewareInterface
{
  public function process(callable $next)
  {

    $requestmethod = strtoupper($_SERVER['REQUEST_METHOD']);
    $validmethods = ['POST', 'PATCH', 'DELETE'];

    if (!in_array($requestmethod, $validmethods)) {
      $next();
      return;
    }

    if ($_SESSION['token'] !== $_POST['token']) {

      redirectTo('/phpiggy/public/');
    }

    unset($_SESSION['token']);

    $next();
  }
}
//93b465de4de7daa64bd6cc87bc0ceb140a5380e834208a72991064d352986dd5
//93b465de4de7daa64bd6cc87bc0ceb140a5380e834208a72991064d352986dd5