<?php

namespace Jaosorio1013\FilamentImport;

use Jaosorio1013\FilamentImport\Actions\ImportField as ActionsImportField;

/**
 * @deprecated moved into ```Jaosorio1013\FilamentImport\Actions\ImportField```
 */
class ImportField extends ActionsImportField
{
    public static function make(string $name): self
    {
        return new self($name);
    }
}
