<?php

namespace App\DataTables\Master;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;
use App\Models\Master\Puskeswan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PuskeswansDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Puskeswan $row) {
                return view('pages.admin.master.Puskeswans.action', ['puskeswan' => $row]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->setRowId('uuid');
    }

    /**
     * Get the query source of dataTable.
     *
     * @param Puskeswan $model
     * @return QueryBuilder
     */
    public function query(Puskeswan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
{
    return $this->builder()
        ->setTableId('puskeswans-table')
        ->columns($this->getColumns())
        ->minifiedAjax(route('puskeswans.index')) // Mengganti 'puskeswans.index' dengan rute yang benar
        ->dom("<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" .
              "<'row'<'col-sm-12'tr>>" .
              "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>")
        ->addTableClass('table align-middle table-row-dashed gy-5 dataTable no-footer text-gray-600 fw-semibold')
        ->setTableHeadClass('text-start text-muted fw-bold text-uppercase gs-0')
        ->language([
            'url' => url('json/lang.json')
        ])
        ->drawCallback('function(settings) {
            // Custom draw callback logic
            // Example: Livewire.dispatch("datatables:draw");
        }')
        ->orderBy(1)
        ->select(false)
        ->buttons([]);
}

    

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20),
            Column::make('name')->title('Nama Puskeswan'),
            Column::make('address')->title('Alamat'),
            // Column::make('kelurahan')->title('Kelurahan'),
            // Column::make('kecamatan')->title('Kecamatan'),
            // Column::make('latitude')->title('Latitude'),
            // Column::make('longitude')->title('Longitude'),
            // Column::make('created_at')->title('Dibuat Pada'),
         // Column::make('updated_at')->title('Dibuat Pada'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Puskeswans_' . date('YmdHis');
    }
}
