<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use App\States;
use App\User;
use App\ShippingStatesHistory;
use App\DataTables\ShippingDataTable;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use File;
use Auth;
use Route;

class ShippingController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ShippingDataTable $dataTable) {
        return $dataTable->render('shipping-module/templates/index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $shipping = new Shipping();
        $shipping->states = 1;
        $states = States::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('shipping-module/templates/add', [
            'shipping' => $shipping,
            'users' => $users,
            'states' => $states,
            'edit' => 0,
                ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        if ($request->fragile == "on") {
            $fragile = 1;
        } else {
            $fragile = 0;
        }

        // Paquet
        $shipping = new Shipping();
        $shipping->code = $request->code;
        $shipping->contact_person = $request->contact_person;
        $shipping->email = $request->email;
        $shipping->telephone = $request->telephone;
        $shipping->address = $request->address;
        $shipping->cp = $request->cp;
        $shipping->city = $request->city;
        $shipping->state = $request->state;
        $shipping->country = $request->country;

        $shipping->number = $request->number;
        $shipping->weight = $request->weight;
        $shipping->size = $request->size;
        $shipping->fragile = $fragile;
        $shipping->states = $request->states;

        $shipping->save();

        //Historic
        $shippingStatesHistory = new ShippingStatesHistory();
        $shippingStatesHistory->shipping_id = $shipping->id;
        $shippingStatesHistory->state_id = $request->states;

        $shippingStatesHistory->save();

        return redirect()->action('ShippingController@edit', ['id' => $shipping->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $shipping = Shipping::find($id);

        $states = States::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('shipping-module/templates/edit', [
            'shipping' => $shipping,
            'users' => $users,
            'states' => $states,
            'edit' => 1,
                ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
        $shipping = Shipping::find($id);
        $shipping->code = $request->code;
        $shipping->contact_person = $request->contact_person;
        $shipping->email = $request->email;
        $shipping->telephone = $request->telephone;
        $shipping->address = $request->address;
        $shipping->cp = $request->cp;
        $shipping->city = $request->city;
        $shipping->state = $request->state;
        $shipping->country = $request->country;

//        $shipping->delivery_date = $request->delivery_date;
        $shipping->number = $request->number;
        $shipping->weight = $request->weight;
        $shipping->size = $request->size;
        $shipping->fragile = $request->fragile;
        $shipping->states = $request->states;
        $shipping->user_id = $request->user_id;

        $shipping->save();

        //Historic
        $shippingStatesHistory = new ShippingStatesHistory();
        $shippingStatesHistory->shipping_id = $shipping->id;
        $shippingStatesHistory->state_id = $request->states;

        $shippingStatesHistory->save();
        
        //Send mail
        $this->sendShippingMail($id);

        return redirect()->action('ShippingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    private function sendShippingMail($id) {

        $data = ['link' => 'http://styde.net'];

        \Mail::send('emails.notificacionSend', $data, function ($message) {
//            $message->from('email@styde.net', 'Styde.Net');
            $message->to('user@example.com')->subject('Notificación 1');
        });

        return "Se envío el email";
    }

}
