<?php

namespace App\DataTables;

use DB;
use Lang;
use App\Shipping;
use Yajra\Datatables\Services\DataTable;

class ShippingDataTable extends DataTable {

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax() {

        $shippings = $this->query();

        return $this->datatables
                        ->eloquent($shippings)
                        ->addColumn('action', function ($shippings) {
                            $return = "";
                            $return .= '<a href="' . route('shippings.edit', $shippings->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> ' . Lang::get('app.edit') . '</a>';
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

        $shippings = Shipping::select();
        return $this->applyScopes($shippings);
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
                                $('.dataTables_filter input').attr('placeholder','" . ucfirst(trans('app.search...')) . "');
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
                "name" => "contact_person",
                "title" => ucfirst(trans('app.contact person')),
                "data" => "contact_person",
            ],
            [
                "name" => "telephone",
                "title" => ucfirst(trans('app.telephone')),
                "data" => "telephone",
            ],
            [
                "name" => "address",
                "title" => ucfirst(trans('app.address')),
                "data" => "address",
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
