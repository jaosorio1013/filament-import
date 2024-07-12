WIP

[//]: # (![Screenshot of Login]&#40;./art/screenshot.png&#41;)

[//]: # ()
[//]: # (# Filament Plugin for Import CSV and XLS into Database)

[//]: # ()
[//]: # (<a href="https://filamentadmin.com/docs/2.x/admin/installation">)

[//]: # (    <img alt="FILAMENT 2.x" src="https://img.shields.io/badge/FILAMENT-2.x-EBB304">)

[//]: # (</a>)

[//]: # (<a href="https://packagist.org/packages/jaosorio1013/filament-import">)

[//]: # (    <img alt="Packagist" src="https://img.shields.io/packagist/v/jaosorio1013/filament-import.svg?logo=packagist">)

[//]: # (</a>)

[//]: # (<a href="https://packagist.org/packages/jaosorio1013/filament-import">)

[//]: # (    <img alt="Downloads" src="https://img.shields.io/packagist/dt/jaosorio1013/filament-import.svg" >)

[//]: # (</a>)

[//]: # ()
[//]: # ([![Code Styles]&#40;https://github.com/jaosorio1013/filament-import/actions/workflows/php-cs-fixer.yml/badge.svg&#41;]&#40;https://github.com/jaosorio1013/filament-import/actions/workflows/php-cs-fixer.yml&#41;)

[//]: # ([![run-tests]&#40;https://github.com/jaosorio1013/filament-import/actions/workflows/run-tests.yml/badge.svg&#41;]&#40;https://github.com/jaosorio1013/filament-import/actions/workflows/run-tests.yml&#41;)

[//]: # ()
[//]: # (This package will make it easier for you to import from files to your model, very easily without the need to do templates.)

[//]: # ()
[//]: # (all you have to do is drag and drop and match the fields and columns of your file, and let magic happens!)

[//]: # ()
[//]: # (## Installation)

[//]: # ()
[//]: # (You can install the package via composer:)

[//]: # ()
[//]: # (```bash)

[//]: # (composer require jaosorio1013/filament-import)

[//]: # (```)

[//]: # ()
[//]: # (## Publishing Config)

[//]: # ()
[//]: # (If you want to do the settings manually, please publish the existing config.)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag=filament-import-config)

[//]: # (```)

[//]: # ()
[//]: # (## Usage)

[//]: # ()
[//]: # (import the actions into `ListRecords` page)

[//]: # ()
[//]: # (```php)

[//]: # (use Jaosorio1013\FilamentImport\Actions\ImportAction;)

[//]: # (use Jaosorio1013\FilamentImport\Actions\ImportField;)

[//]: # ()
[//]: # (class ListCredentialDatabases extends ListRecords)

[//]: # ({)

[//]: # (    protected static string $resource = CredentialDatabaseResource::class;)

[//]: # ()
[//]: # (    protected function getActions&#40;&#41;: array)

[//]: # (    {)

[//]: # (        return [)

[//]: # (            ImportAction::make&#40;&#41;)

[//]: # (                ->fields&#40;[)

[//]: # (                    ImportField::make&#40;'project'&#41;)

[//]: # (                        ->label&#40;'Project'&#41;)

[//]: # (                        ->helperText&#40;'Define as project helper'&#41;,)

[//]: # (                    ImportField::make&#40;'manager'&#41;)

[//]: # (                        ->label&#40;'Manager'&#41;,)

[//]: # (                ]&#41;)

[//]: # (        ];)

[//]: # (    })

[//]: # (})

[//]: # (```)

[//]: # (### Required Field)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Disable Mass Create)

[//]: # (if you still want to stick with the event model you might need this and turn off mass create)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->massCreate&#40;false&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Filter Out Blank Rows)

[//]: # (If you have a spreadsheet which includes blank data [click here to see more]&#40;https://thesoftwarepro.com/excel-tips-how-to-fill-blank-cells/&#41;, you can filter these out:)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->handleBlankRows&#40;true&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Field Data Mutation)

[//]: # (you can also manipulate data from row spreadsheet before saving to model)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->mutateBeforeCreate&#40;fn&#40;$value&#41; => Str::of&#40;$value&#41;->camelCase&#40;&#41;&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # (otherwise you can manipulate data and getting all mutated data from field before its getting insert into the database.)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'email'&#41;)

[//]: # (                    ->label&#40;'Email'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;->mutateBeforeCreate&#40;function&#40;$row&#41;{)

[//]: # (                $row['password'] = bcrypt&#40;$row['email']&#41;;)

[//]: # ()
[//]: # (                return $row;)

[//]: # (            }&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # (it is also possible to manipulate data after it was inserted into the database)

[//]: # (```php)

[//]: # (use Illuminate\Database\Eloquent\Model;)

[//]: # ()
[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'email'&#41;)

[//]: # (                    ->label&#40;'Email'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ]&#41;->mutateAfterCreate&#40;function&#40;Model $model, $row&#41;{)

[//]: # (                // do something with the model)

[//]: # ()
[//]: # (                return $model;)

[//]: # (            }&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Grid Column)

[//]: # (Of course, you can divide the column grid into several parts to beautify the appearance of the data map)

[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ], columns:2&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Json Format Field)

[//]: # (We also support the json format field, which you can set when calling the `make` function and separate the name with a dot annotation)

[//]: # ()
[//]: # (```php)

[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'project.en'&#41;)

[//]: # (                    ->label&#40;'Project In English'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (                ImportField::make&#40;'project.id'&#41;)

[//]: # (                    ->label&#40;'Project in Indonesia'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ], columns:2&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Static Field Data)

[//]: # (for the static field data you can use the common fields from filament)

[//]: # ()
[//]: # (```php)

[//]: # (use Filament\Forms\Components\Select;)

[//]: # ()
[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'name'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (                Select::make&#40;'status'&#41;)

[//]: # (                    ->options&#40;[)

[//]: # (                        'draft' => 'Draft',)

[//]: # (                        'reviewing' => 'Reviewing',)

[//]: # (                        'published' => 'Published',)

[//]: # (                    ]&#41;)

[//]: # (            ], columns:2&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Unique field)

[//]: # (if your model should be unique, you can pass the name of the field, which will be used to check if a row already exists in the database. if it exists, skip that row &#40;preventing an error about non unique row&#41;)

[//]: # ()
[//]: # (```php)

[//]: # (use Filament\Forms\Components\Select;)

[//]: # ()
[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->uniqueField&#40;'email'&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'email'&#41;)

[//]: # (                    ->label&#40;'Email'&#41;)

[//]: # (                    ->required&#40;&#41;,)

[//]: # (            ], columns:2&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Validation)

[//]: # (you can make the validation for import fields, for more information about the available validation please check laravel documentation)

[//]: # ()
[//]: # (```php)

[//]: # (use Filament\Forms\Components\Select;)

[//]: # ()
[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'name'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->rules&#40;'required|min:10|max:255'&#41;,)

[//]: # (            ], columns:2&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Create Record)

[//]: # (you can overide the default record creation closure and put your own code by using `handleRecordCreation` function)

[//]: # ()
[//]: # (```php)

[//]: # (use Filament\Forms\Components\Select;)

[//]: # ()
[//]: # (protected function getActions&#40;&#41;: array)

[//]: # ({)

[//]: # (    return [)

[//]: # (        ImportAction::make&#40;&#41;)

[//]: # (            ->fields&#40;[)

[//]: # (                ImportField::make&#40;'name'&#41;)

[//]: # (                    ->label&#40;'Project'&#41;)

[//]: # (                    ->rules&#40;'required|min:10|max:255'&#41;,)

[//]: # (            ], columns:2&#41;)

[//]: # (            ->handleRecordCreation&#40;function&#40;$data&#41;{)

[//]: # (                return Post::create&#40;$data&#41;;)

[//]: # (            }&#41;)

[//]: # (    ];)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # ()
[//]: # (## Testing)

[//]: # ()
[//]: # (```bash)

[//]: # (composer test)

[//]: # (```)

[//]: # ()
[//]: # (## Changelog)

[//]: # ()
[//]: # (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information on what has changed recently.)

[//]: # ()
[//]: # (## Contributing)

[//]: # ()
[//]: # (Please see [CONTRIBUTING]&#40;https://github.com/jaosorio1013/.github/blob/main/CONTRIBUTING.md&#41; for details.)

[//]: # ()
[//]: # (## Security Vulnerabilities)

[//]: # ()
[//]: # (Please review [our security policy]&#40;../../security/policy&#41; on how to report security vulnerabilities.)

[//]: # ()
