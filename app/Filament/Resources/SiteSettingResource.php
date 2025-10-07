<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    // Show as a top-level item right under the panel Dashboard link
    protected static ?string $navigationGroup = null;
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('General')
                ->schema([
            Forms\Components\TextInput::make('email')
                ->email()
                ->placeholder('your@email.com'),

            Forms\Components\Textarea::make('home_header')
                ->label('Header text (home)')
                ->rows(2)
                ->placeholder('A Creative (Motion) Designer based in Leeuwarden.'),

            Forms\Components\TextInput::make('header_tagline')
                ->label('Header tagline (navigation)')
                ->placeholder('Creative (Motion) Designer'),

            Forms\Components\Textarea::make('about_text')
                ->label('About text')
                ->rows(5)
                ->placeholder('About page text'),
                ]),

            Forms\Components\Section::make('Experience')
                ->schema([
            Forms\Components\Repeater::make('experience')
                ->label('Experience items')
                ->schema([
                    Forms\Components\TextInput::make('label')->label('Item'),
                    Forms\Components\TextInput::make('url')->label('URL')->nullable(),
                ])
                ->default([])
                ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Socials')
                ->schema([
                    Forms\Components\Repeater::make('socials')
                        ->schema([
                            Forms\Components\TextInput::make('name')->label('Name'),
                            Forms\Components\TextInput::make('url')->label('URL'),
                        ])
                        ->default([])
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 1,
            ])
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\TextColumn::make('email')->label('Email'),
                    Tables\Columns\TextColumn::make('home_header')->label('Home Header')->wrap(),
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            // Open the edit form directly at the index route for the singleton record
            'index' => Pages\EditSiteSetting::route('/'),
        ];
    }
}


