<?php

declare(strict_types=1);

namespace App\Middlewares;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\SessionException;

class SessionMiddleware implements MiddlewareInterface
{
  public function process(callable $next)
  {
    if ((session_status() === PHP_SESSION_ACTIVE)) {
      throw new SessionException("Session Already Active");
    }

    if (headers_sent($filename, $line)) {
      throw new SessionException("Headers Already sent Consider enabling Output beffering.Data outputted from {$filename} - Line:{$line}");
    }

    session_start();




    $next();

    session_write_close();
  }
}
