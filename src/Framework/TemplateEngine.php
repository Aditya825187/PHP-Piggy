<?php

declare(strict_types=1);

namespace Framework;

class Templateengine
{
  public function __construct(private string $basepath)
  {
  }

  public function render(string $template)
  {
    include "{$this->basepath}/{$template}";
  }
}
