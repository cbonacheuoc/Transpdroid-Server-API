<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\States;
use App\ShippingStatesHistory;
use Lang;

class FrontController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatesByCode(Request $request) {

        $code = $request->input('code');

        $output = array(
            "data" => array()
        );

        $html = '<span style="color:red">No s\'ha trobat cap registre amb aquest codi</span>';
        
        if ($code) {
            $shipping = Shipping::where('code', $code)->first();
            if ($shipping) {
                $statesHistories = ShippingStatesHistory::where('shipping_id', $shipping->id)->get();
                $stadosHtml = '';
                foreach ($statesHistories as $statesHistory) {
                    $states = States::find($statesHistory->state_id);
                    $stadosHtml .= '<tr>'
                                    .'<td>' . $statesHistory->created_at->format('H:i:s d-m-Y') . '</td>'
                                    .'<td>' . $states->name . '</td>'
                                .'</tr>'
                            ;
                }
                $html = '<div class="col-sm-12">'
                        .'<div class="panel panel-default">'
                            .'<div class="panel-heading">'
                                .'<h3 class="panel-title">'.ucfirst(Lang::get('app.shipping shipping states with code: ')). $shipping->shipping_code . '</h3>'
                            .'</div>'
                            .'<div class="panel-body">'
                                .'<table class="table table-striped">'
                                    .'<thead>'
                                        .'<tr>'
                                            .'<th>Dates</th>'
                                            .'<th>States</th>'
                                        .'</tr>'
                                    .'</thead>'
                                    .'<tbody>'
                                     . $stadosHtml
                                    .'</tbody>'
                                .'</table>'
                            .'</div>'
                        .'</div>'
                    .'</div>';

                
            }
        }
        $output["data"] = [
            "html" => $html,
        ];
        return response()->json($output);
    }

}

