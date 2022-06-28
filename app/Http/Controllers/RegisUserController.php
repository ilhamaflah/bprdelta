<?php

namespace App\Http\Controllers;

use App\User;
use App\Nasabah;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Http\Requests\RegisUserStoreRequest;

class RegisUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registeruser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisUserStoreRequest $request)
    {
        /*$validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'min:6', 'unique:users'],
        'no_handphone' => ['required', 'string', 'min:6', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);*/

        /*$request->validate([
        'name' => 'required', 'string', 'max:255',
        'username' => 'required', 'string', 'min:6', 'unique:users',
        'no_handphone' => 'required', 'string', 'min:6', 'unique:users',
        'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);*/
        $validated = $request->validated();

        /*if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }*/

        $name = $request->get('name');
        $username = $request->get('username');
        $no_handphone = $request->get('no_handphone');
        $password = Hash::make($request->get('password'));

        User::create([
            'name' => $name,
            'username' => $username,
            'no_handphone' => $no_handphone,
            'active' => '0',
            'role' => '0',
            'password' => $password,
            ]);

        $user_id = (\DB::table('users')->max('id'));
        if($user_id == 0){
            $user_id = 1;
        }
        else{
            $user_id = (\DB::table('users')->max('id'));
        }

        if($request->get('role') == 'nasabah'){
            return redirect('registeruser')->with('pesan', 'Nasabah dengan nama '.$name.' telah terdaftar.');
        }
        else if($request->get('role') == 'pegawai'){
            return redirect('registeruser')->with('pesan', 'Pegawai dengan nama '.$name.' telah terdaftar.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
