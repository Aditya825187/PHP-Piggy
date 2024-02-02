<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Templateengine;

use Framework\Contracts\MiddlewareInterface;

class TemplateDataMiddleware implements MiddlewareInterface
{
  public function __construct(private Templateengine $view)
  {
  }
  public function process(callable $next)
  {

    $this->view->addGlobal("title", "A Expense tracker Application");
    $next();
  }
}
