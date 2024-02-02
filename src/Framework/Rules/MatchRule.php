<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MatchRule implements RuleInterface
{
  public function validate(array $data, string $field, array $params): bool
  {
    $fieldOne = $data[$field];
    $fieldtwo = $data[$params[0]];

    return $fieldOne === $fieldtwo;
  }

  public function getMessage(array $data, string $field, array $params): string
  {
    return "Passaword does not match";
  }
}
