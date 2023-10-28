<?php

namespace App\DataTables;

use App\Models\BannedUser;
use App\Models\Users\UserBan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannedUsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('id', function(UserBan $userBan){

                return $userBan->user->id;
            })
            ->addColumn('firstname', function(UserBan $userBan){

                return $userBan->user->firstname;
            })
            ->addColumn('lastname', function(UserBan $userBan){

                return $userBan->user->lastname;
            })
            ->addColumn('banning_duration', function(UserBan $userBan){

                switch($userBan->ban_type){

                    case 'duration':
                        
                        return '<span class="text-danger fw-bold">'.$userBan->duration_amount.' '.$userBan->duration.'</span>';
                    break;

                    case 'daterange':
                        $from = date('Y-m-d', strtotime($userBan->from));
                        $to = date('Y-m-d', strtotime($userBan->to));

                        return '<span class="text-danger fw-bold">From : '.$from.' - to : '.$to.'</span>';
                    break;

                    case 'forever':
                        return '<span class="text-danger fw-bold">Forever</span>';
                    break;
                }
            })
            ->addColumn('action', function(UserBan $userBan){

                $user = $userBan->user;

                return view('admin.pages.banned-user.info', compact('user'));
            })
            ->rawColumns(['banning_duration'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BannedUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserBan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bannedusers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->dom('Bfrtip')
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('print'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('firstname'),
            Column::make('lastname'),
            Column::make('banning_duration')->title('Banning Duration'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'BannedUsers_' . date('YmdHis');
    }
}
