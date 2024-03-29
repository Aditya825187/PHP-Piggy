<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;
use Framework\Templateengine;

class CsrfTokenMiddleware implements MiddlewareInterface
{
  public function __construct(private Templateengine $view)
  {
  }
  public function process(callable $next)
  {

    $_SESSION['token'] = $_SESSION['token'] ?? bin2hex(random_bytes(32));

    $this->view->addGlobal('csrfToken', $_SESSION['token']);
    $next();
  }
}
