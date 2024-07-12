<?php

namespace Jaosorio1013\FilamentImport\Tests\Resources\Pages;

use Filament\Resources\Pages\ListRecords;
use Jaosorio1013\FilamentImport\Actions\ImportAction;
use Jaosorio1013\FilamentImport\Actions\ImportField;
use Jaosorio1013\FilamentImport\Tests\Resources\Models\Post;
use Jaosorio1013\FilamentImport\Tests\Resources\PostResource;

class AlternativeColumnsNamesList extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            ImportAction::make('import')
                ->fields([
                    ImportField::make('title')->alternativeColumnNames(['Title']),
                    ImportField::make('slug')->alternativeColumnNames(['Slug']),
                    ImportField::make('body')->alternativeColumnNames(['Body']),
                ])
                ->handleRecordCreation(function ($data) {
                    return Post::create($data);
                }),
        ];
    }
}
