<?php

declare(strict_types=1);

namespace App\Services;


use Framework\Rules\{RequiredRule, EmailRule, MinRule, InRule, UrlRule, MatchRule};


use Framework\Validator;

class ValidatorService
{
  private Validator $validator;
  public function __construct()
  {
    $this->validator = new Validator();
    $this->validator->add("required", new RequiredRule());
    $this->validator->add("email", new EmailRule());
    $this->validator->add("min", new MinRule());
    $this->validator->add("in", new InRule());
    $this->validator->add("url", new UrlRule());
    $this->validator->add("match", new MatchRule());
  }



  public function validateRegister(array $formdata)
  {
    $this->validator->validate($formdata, [
      'email' => ['required', 'email'],
      'age' => ['required', 'min:18'],
      'country' => ['required', 'in:USA,Canada,Mexico'],
      'socialMediaURL' => ['required', 'url'],
      'password' => ['required'],
      'confirmpassword' => ['required', 'match:password'],
      'tos' => ['required']
    ]);
  }
}
