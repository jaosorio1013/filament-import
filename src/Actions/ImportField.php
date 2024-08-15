<?php

namespace Jaosorio1013\FilamentImport\Actions;

use Filament\Support\Components\Component;
use Jaosorio1013\FilamentImport\Concerns\HasColumnMatching;
use Jaosorio1013\FilamentImport\Concerns\HasFieldExample;
use Jaosorio1013\FilamentImport\Concerns\HasFieldHelper;
use Jaosorio1013\FilamentImport\Concerns\HasFieldLabel;
use Jaosorio1013\FilamentImport\Concerns\HasFieldMutation;
use Jaosorio1013\FilamentImport\Concerns\HasFieldPlaceholder;
use Jaosorio1013\FilamentImport\Concerns\HasFieldRequire;
use Jaosorio1013\FilamentImport\Concerns\HasFieldValidation;

class ImportField extends Component
{
    use HasColumnMatching;
    use HasFieldHelper;
    use HasFieldLabel;
    use HasFieldMutation;
    use HasFieldPlaceholder;
    use HasFieldRequire;
    use HasFieldValidation;
    // use HasFieldExample;

    public function __construct(private readonly string $name)
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
