<?php

namespace App\DataTables\Setting;

use App\Models\User;
use App\Models\Setting\VeterinaryProfile; // Add this line
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VeterinaryProfileDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
    ->addColumn('action', function (VeterinaryProfile $row) {
        return view('pages.admin.setting.veterinary-profile.action', ['profile' => $row]); // Ensure the key is 'profile'
    })
    ->addIndexColumn()
    ->editColumn('description', function (VeterinaryProfile $profile) {
        return substr($profile->description, 0, 50) . '...';
    })
    ->editColumn('created_by', function (VeterinaryProfile $profile) {
        return User::find($profile->created_by)->name;
    })
    ->editColumn('updated_by', function (VeterinaryProfile $profile) {
        return User::find($profile->updated_by)->name;
    })
    ->editColumn('created_at', function (VeterinaryProfile $profile) {
        return $profile->created_at->format('d, M Y H:i');
    })
    ->editColumn('updated_at', function (VeterinaryProfile $profile) {
        return $profile->updated_at->format('d, M Y H:i');
    })
    ->rawColumns(['action'])
    ->setRowId('id');

    }

    public function query(VeterinaryProfile $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('profile-table')
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                        data._token = '".csrf_token()."';
                        data._p = 'POST';
                    ")
            ->dom('rt'."<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold  text-uppercase gs-0')
            ->language(url('json/lang.json'))
            ->orderBy(2)
            ->select(false)
            ->buttons([]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('title')->title('Nama Puskeswan'),
            Column::make('description')->title('Deskripsi'),
            Column::make('photo')->title('Photo'),
           
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'News_'.date('YmdHis');
    }
}
