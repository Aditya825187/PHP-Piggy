<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\{ValidatorService, UserService};

use Framework\Templateengine;


class AuthController
{

  public function __construct(private Templateengine $view, private ValidatorService $validatorService, private UserService $userService)
  {
  }

  public function registerView()
  {
    echo $this->view->render("register.php");
  }

  public function register()
  {
    $this->validatorService->validateRegister($_POST);
    $this->userService->isEmailTaken($_POST['email']);

    redirectTo('/phpiggy/public/');
  }
}
