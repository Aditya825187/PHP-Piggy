<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Config;
use App\Config\Paths;

class AboutController
{


  public function __construct(private Templateengine $view)
  {
  }

  public function about()
  {
    echo $this->view->render("about.php", ['dangersdata' => '<script>alert(123)</script>', 'title' => 'About']);
  }
}
