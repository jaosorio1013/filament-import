<?php

namespace Jaosorio1013\FilamentImport\Concerns;

trait HasColumnMatching
{
    protected ?array $alternativeColumnNames = [];

    public function alternativeColumnNames(array $alternativeColumnNames): static
    {
        $this->alternativeColumnNames = $alternativeColumnNames;

        return $this;
    }

    public function getAlternativeColumnNames(): array
    {
        return $this->alternativeColumnNames;
    }
}
