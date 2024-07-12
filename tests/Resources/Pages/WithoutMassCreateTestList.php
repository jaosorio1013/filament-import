<?php

namespace Jaosorio1013\FilamentImport\Tests\Resources\Pages;

use Filament\Resources\Pages\ListRecords;
use Jaosorio1013\FilamentImport\Actions\ImportAction;
use Jaosorio1013\FilamentImport\Actions\ImportField;
use Jaosorio1013\FilamentImport\Tests\Resources\PostResource;

class WithoutMassCreateTestList extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            ImportAction::make('import')
                ->massCreate(false)
                ->fields([
                    ImportField::make('title'),
                    ImportField::make('slug')
                        ->rules('min:6'),
                    ImportField::make('body'),
                ]), ];
    }
}
