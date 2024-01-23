<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Templateengine;
use App\Config;
use App\Config\Paths;

class AboutController
{
  private Templateengine $view;

  public function __construct()
  {
    $this->view = new Templateengine(Paths::VIEW);
  }

  public function about()
  {
    echo $this->view->render("about.php", ['dangersdata' => '<script>alert(123)</script>', 'title' => 'About']);
  }
}
