<?php

namespace Jaosorio1013\FilamentImport\Actions;

use Jaosorio1013\FilamentImport\Concerns\HasColumnMatching;
use Jaosorio1013\FilamentImport\Concerns\HasFieldHelper;
use Jaosorio1013\FilamentImport\Concerns\HasFieldLabel;
use Jaosorio1013\FilamentImport\Concerns\HasFieldMutation;
use Jaosorio1013\FilamentImport\Concerns\HasFieldPlaceholder;
use Jaosorio1013\FilamentImport\Concerns\HasFieldRequire;
use Jaosorio1013\FilamentImport\Concerns\HasFieldValidation;

class ImportField
{
    use HasColumnMatching;
    use HasFieldHelper;
    use HasFieldLabel;
    use HasFieldMutation;
    use HasFieldPlaceholder;
    use HasFieldRequire;
    use HasFieldValidation;

    public function __construct(private string $name)
    {
    }

    public static function make(string $name): self
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
