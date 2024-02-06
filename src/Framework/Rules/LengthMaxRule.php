<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class LengthMaxRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    $length = (int) $params[0];
    return strlen($data[$field]) < $length;
  }
  public function getMessage(array $data, string $field, array $params): string
  {
    return "Exceed maximum limit of {$params[0]} characters";
  }
}
