<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\States;
use App\DataTables\StatesDataTable;

class StatesController extends Controller {

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
    public function index(StatesDataTable $dataTable) {
        return $dataTable->render('states-module/templates/index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $states = new States();

        return view('states-module/templates/add', [
            'states' => $states,
                ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        // Paquet
        $states = new States();
        $states->name = $request->name;
        $states->code = $request->code;
        $states->description = $request->description;
        $states->save();
        
        return redirect()->action('StatesController@edit', ['id' => $states->id]);
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
        $states = States::find($id);

        return view('states-module/templates/edit', [
            'states' => $states,
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
        $states = States::find($id);
        $states->name = $request->name;
        $states->code = $request->code;
        $states->description = $request->description;
        $states->save();

        return redirect()->action('StatesController@index');
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
}
