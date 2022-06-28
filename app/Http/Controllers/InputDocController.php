<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Gambardokumen;
use App\User;
use Illuminate\Http\Request;
use Auth;

class InputDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction');
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
    public function store(Request $request)
    {
        $userid = Auth::user()->id;

        //$idNasabah = Nasabah::where('id', '=', $userid);

        $name = Auth::user()->name;
        //$name = $file->getClientOriginalExtension();
        //$ktp = $request->file('ktp');
        //$kk = $request->file('kk');
        //$akte = $request->file('akte');

        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'mimes:jpg,jpeg,png'
        ]);

        $dokumen = new Dokumen();
        $dokumen->name = $name;
        $dokumen->user_id = $userid;

        $dokumen->save();

        $idDokumen = Dokumen::max('id');

        if(file_exists('../public/images/dokumen/')){
        }
        else{
            mkdir('../public/images/dokumen/');
        }

        if(file_exists('../public/images/dokumen/'.$name.'/')){
        }
        else{
            mkdir('../public/images/dokumen/'.$name.'/');
        }

        if(file_exists('../public/images/dokumen/'.$name.'/'.$idDokumen.'/')){

            if($request->hasfile('filename'))
            {
                //$i = 0;
                foreach($request->file('filename') as $file)
                {
                    $idGambar = (\DB::table('gambardokumens')->max('id'));
                    if($idGambar == 0){
                        $idGambar = 1;
                    }
                    else{
                        $idGambar = (\DB::table('gambardokumens')->max('id')) + 1;
                    }
                    $file->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idGambar.".".$file->getClientOriginalExtension());
                    //$data[] = $file->getClientOriginalExtension();

                    $gambardokumen = new Gambardokumen();
                    $gambardokumen->dokumen_id = $idDokumen;
                    $gambardokumen->extension = $file->getClientOriginalExtension();
        
                    $gambardokumen->save();
                    //$i++;
                }
            }
            return redirect('dokumen')->with('pesan', $name.' dokumen telah Anda kirimkan.');

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $ktp->getClientOriginalExtension();
            // $ktp->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$ktp->getClientOriginalExtension());
            // $gambardokumen->save();

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $kk->getClientOriginalExtension();
            // $kk->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$kk->getClientOriginalExtension());
            // $gambardokumen->save();

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $akte->getClientOriginalExtension();
            // $akte->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$akte->getClientOriginalExtension());
            // $gambardokumen->save();
        }
        else{
            mkdir('../public/images/dokumen/'.$name.'/'.$idDokumen.'/');

            if($request->hasfile('filename'))
            {
                //$i = 0;
                foreach($request->file('filename') as $file)
                {
                    $idGambar = (\DB::table('gambardokumens')->max('id'));
                    if($idGambar == 0){
                        $idGambar = 1;
                    }
                    else{
                        $idGambar = (\DB::table('gambardokumens')->max('id')) + 1;
                    }
                    $file->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idGambar.".".$file->getClientOriginalExtension());
                    //$data[] = $file->getClientOriginalExtension();

                    $gambardokumen = new Gambardokumen();
                    $gambardokumen->dokumen_id = $idDokumen;
                    $gambardokumen->extension = $file->getClientOriginalExtension();
        
                    $gambardokumen->save();
                    //$i++;
                }
            }
            return redirect('dokumen')->with('pesan', $name.' dokumen telah Anda kirimkan.');

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $ktp->getClientOriginalExtension();
            // $ktp->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$ktp->getClientOriginalExtension());
            // $gambardokumen->save();

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $kk->getClientOriginalExtension();
            // $kk->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$kk->getClientOriginalExtension());
            // $gambardokumen->save();

            // $gambardokumen = new Gambardokumen();
            // $gambardokumen->dokumen_id = $idDokumen;
            // $gambardokumen->extension = $akte->getClientOriginalExtension();
            // $akte->move('../public/images/dokumen/'.$name.'/'.$idDokumen.'/', $idDokumen.".".$akte->getClientOriginalExtension());
            // $gambardokumen->save();
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
