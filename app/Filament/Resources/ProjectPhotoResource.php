<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectPhotoResource\Pages;
use App\Filament\Resources\ProjectPhotoResource\RelationManagers;
use App\Models\ProjectPhoto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProjectPhotoResource extends Resource
{
    protected static ?string $model = ProjectPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Projects';

    protected static ?string $modelLabel = 'Project Photo';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FileUpload::make('photo')
                ->image()
                ->preserveFilenames()
                ->directory('image/projects')
                ->getUploadedFileNameForStorageUsing(
                    fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                        ->prepend(now()->timestamp),
                )
                ->openable()
                ->downloadable()
                ->required(),
                Forms\Components\Select::make('project_id')
                ->label('project')
                ->searchable()
                ->preload()
                ->relationship('project', 'title'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('project.title')
            ->searchable()
            ->sortable(),
            Tables\Columns\ImageColumn::make('photo'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            SelectFilter::make('project_id')
                ->label('project')
                ->searchable()
                ->preload()
                ->relationship('project', 'title'),
        ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectPhotos::route('/'),
            'create' => Pages\CreateProjectPhoto::route('/create'),
            'view' => Pages\ViewProjectPhoto::route('/{record}'),
            'edit' => Pages\EditProjectPhoto::route('/{record}/edit'),
        ];
    }
}
