<?php

namespace App\DataTables;

use DB;
use Lang;
use App\States;
use Yajra\Datatables\Services\DataTable;

class StatesDataTable extends DataTable {

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax() {

        $states = $this->query();

        return $this->datatables
                        ->eloquent($states)
                        ->addColumn('action', function ($states) {
                            $return = "";
                                $return .= '<a href="' . route('states.edit', $states->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> ' . Lang::get('app.edit') . '</a>';
                            return $return;
                        })
                        ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query() {
        
        $states = States::select();
        return $this->applyScopes($states);
        
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html() {

        return $this->builder()
                        ->columns($this->getColumns())
                        ->parameters([
                            'language' => ['url' => url('/datatables-translations')],
                            'dom' => '<"clearfix"f>rtip',
                            'buttons' => [],
                            'initComplete' => "function () {
                                $('.dataTables_filter input').addClass('form-control');
                                $('.dataTables_filter input').attr('placeholder','". ucfirst(trans('app.search...')) ."');
                                $('table.dataTable thead .sorting:after').css('content', 'none');  
                                $('table.dataTable thead .sorting_desc:after').css('content', 'none');  
                             }",
                        ])
        ;
    }

    /**
     * @return array
     */
    protected function getColumns() {

        $columns = [
            'id',
            [
                "name" => "code",
                "title" => ucfirst(trans('app.code')),
                "data" => "code",
            ],
            [
                "name" => "name",
                "title" => ucfirst(trans('app.name')),
                "data" => "name",
            ],
            [
                "name" => "action",
                "title" => ucfirst(trans('app.actions')),
                "data" => "action",
                "orderable" => false,
                "searchable" => false
            ],
        ];

        return $columns;
    }

}
