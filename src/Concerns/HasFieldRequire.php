<?php

namespace Jaosorio1013\FilamentImport\Concerns;

trait HasFieldRequire
{
    protected $isRequired = false;

    public function required(): static
    {
        $this->isRequired = true;

        return $this;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }
}
