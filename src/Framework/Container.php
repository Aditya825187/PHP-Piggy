<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;
use Framework\Exception\ContainerException;

class Container
{
  private array $definitions = [];

  public function addDefinition(array $newDefinition)
  {
    $this->definitions = [...$this->definitions, ...$newDefinition];
  }


  public function resolve(string $className)
  {
    $reflectionclass = new ReflectionClass($className);

    if (!$reflectionclass->isInstantiable()) {
      throw new ContainerException("Class {$className} is not instantiable");
    }

    $constructor = $reflectionclass->getConstructor();

    if (!$constructor) {
      return new $className;
    }

    $params = $constructor->getParameters();
    if (count($params) === 0) {
      return new $className;
    }
    dd($params);
  }
}
