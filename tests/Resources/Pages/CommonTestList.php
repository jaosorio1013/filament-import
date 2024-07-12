<?php

namespace Jaosorio1013\FilamentImport\Tests\Resources\Pages;

use Filament\Resources\Pages\ListRecords;
use Jaosorio1013\FilamentImport\Actions\ImportAction;
use Jaosorio1013\FilamentImport\Actions\ImportField;
use Jaosorio1013\FilamentImport\Tests\Resources\PostResource;

class CommonTestList extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            ImportAction::make('import')
                ->fields([
                    ImportField::make('title'),
                    ImportField::make('slug'),
                    ImportField::make('body'),
                ]), ];
    }
}
