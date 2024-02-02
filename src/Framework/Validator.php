<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator
{

  private array $rules = [];

  public function add(string $alias, RuleInterface $rule)
  {
    $this->rules[$alias] = $rule;
  }
  public function validate(array $formdata, array $fields)
  {
    $errors = [];

    foreach ($fields as $fieldname => $rules) {

      foreach ($rules as $rule) {
        $ruleparams = [];
        if (str_contains($rule, ':')) {
          [$rule, $ruleparams] = explode(':', $rule);
          $ruleparams = explode(',', $ruleparams);
        }
        $ruleValidator = $this->rules[$rule];

        if ($ruleValidator->validate($formdata, $fieldname, $ruleparams)) {

          continue;
        }

        $errors[$fieldname][] = $ruleValidator->getMessage($formdata, $fieldname, $ruleparams);
      }
    }

    if (count($errors) > 0) {
      throw new ValidationException($errors);
    }
  }
}
