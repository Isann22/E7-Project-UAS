<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use pxlrbt\FilamentExcel\Columns\Column;
use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

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
