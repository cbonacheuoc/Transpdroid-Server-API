<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\DataTables\UsersDataTable;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Route;

class UserController extends Controller {

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
    public function index(UsersDataTable $dataTable) {
        return $dataTable->render('user-module/templates/index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $user = new User();

        return view('user-module/templates/add', [
            'user' => $user,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        //
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $roles = $request->get('roles', []);
        $user->attachRoles($roles);

        return redirect()->action('UserController@edit', ['id' => $user->id]);
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
        $user = User::find($id);

        return view('user-module/templates/edit', [
            'user' => $user,
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->type = $request->type;

        $user->save();

        return redirect()->action('UserController@index');
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

    ############################################################################
    #
    # Others Functions
    #
    ############################################################################

//    private function checkUserExistsByEmail($email) {
//        $return = false;
//
//        $adminByEmail = User::where('email', $email)->first();
//        if ($adminByEmail) {
//            $return = true;
//        }
//        return $return;
//    }
//
//    private function checkUserExistsByUser($user) {
//        $return = false;
//
//        $adminByName = User::where('login', $user)->first();
//        if ($adminByName) {
//            $return = true;
//        }
//        return $return;
//    }

}
