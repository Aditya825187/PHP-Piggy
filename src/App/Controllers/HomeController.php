<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Config\Paths;

class HomeController
{


  public function __construct(private Templateengine $view)
  {
  }
  public function Home()
  {
    echo $this->view->render("/index.php");
  }
}
