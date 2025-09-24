<?php

namespace App\DataTables\Pencatatan;

use App\Models\Pencatatan\GoodsSupply;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GoodsSupplyDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'GoodsRecording.action')
            ->addIndexColumn()
            // ->addColumn('action', function (GoodsSupply $row) {
            //     return view('pages.admin.pencatatan.GoodsSupply.action', ['persediaan' => $row]);
            // })
            ->editColumn('goods_id', function (GoodsSupply $row) {
                return $row->goods->goods_name;
            })
            ->editColumn('unit_id', function (GoodsSupply $row) {
                return $row->unit->unit_type;
            })
            // ->editColumn('warehouse_id', function (GoodsSupply $row) {
            //     return $row->warehouse->warehouse_name;
            // })
            ->editColumn('puskeswan_id', function (GoodsSupply $row) {
                return $row->puskeswan->name;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(GoodsSupply $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('goodssupply-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                            data._token = '" . csrf_token() . "';
                            data._p = 'POST';
                        ")
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->drawCallbackWithLivewire(file_get_contents(public_path('/assets/js/dataTables/drawCallback.js')))
            ->orderBy(2)
            ->select(false)
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->width(20)
                ->className('text-center'),
            Column::make('goods_id')->title('Nama Barang')->className('text-center'),
            Column::make('unit_id')->title('Satuan')->className('text-center'),
            Column::make('puskeswan_id')->title('Puskeswan')->className('text-center'),
            Column::make('stock')->title('Stok Barang')->className('text-center'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'GoodsSupply_' . date('YmdHis');
    }
}
