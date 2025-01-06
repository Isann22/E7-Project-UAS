<?php

namespace App\Filament\Resources\VenueResource\Pages;

use Filament\Actions;
use pxlrbt\FilamentExcel\Columns\Column;
use App\Filament\Resources\VenueResource;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListVenues extends ListRecords
{
    protected static string $resource = VenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename(fn($resource) => $resource::getModelLabel() . '-' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::CSV)
                        ->withColumns([
                            Column::make('updated_at'),
                        ])
                ]),

            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->color("primary"),
        ];
    }
}
