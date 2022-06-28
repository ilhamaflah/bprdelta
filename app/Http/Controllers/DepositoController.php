<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposito;
use App\User;
use Auth;

class DepositoController extends Controller
{
    public function index()
    {
        $deposito = Deposito::find(1);

		return view('deposito', compact('deposito'));
    }

    public function edit($id)
    {
        $deposito = Deposito::where('id', 1)->first();
        return view('deposito.edit', compact('deposito'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $file_deposito = $request->file('gambar_deposito');
        $keterangan = $request->get('keterangan');
        $manfaat = $request->get('manfaat');

        $deposito = Deposito::find($id);
        $deposito->keterangan = $keterangan;
        $deposito->manfaat = $manfaat;
        $deposito->user_id = $userid;

        $idPost = $id;

        if ($request->hasFile('photo') || $request->hasFile('gambar_deposito')) {
            if($request->hasFile('photo')){
                if(file_exists('../public/images/'.$deposito->banner)){
                    unlink('../public/images/'.$deposito->banner);
                    $deposito->banner = $idPost.'deposito.'.$file->getClientOriginalExtension();
                    //$imgInfo = $file->getSize();
                    $file->move('../public/images', $idPost."deposito.".$file->getClientOriginalExtension());
                }
                else{
                    $deposito->banner = $idPost.'deposito.'.$file->getClientOriginalExtension();
                    //$imgInfo = $file->getSize();
                    $file->move('../public/images', $idPost."deposito.".$file->getClientOriginalExtension());
                }
                $deposito->save();
            }
            if($request->hasFile('gambar_deposito')){
                if(file_exists('../public/images/'.$deposito->gambar)){
                    unlink('../public/images/'.$deposito->gambar);
                    $deposito->gambar = $idPost.'deposito_gambar.'.$file_deposito->getClientOriginalExtension();
                    //$imgInfo = $file->getSize();
                    $file_deposito->move('../public/images', $idPost."deposito_gambar.".$file_deposito->getClientOriginalExtension());
                }
                else{
                    $deposito->gambar = $idPost.'deposito_gambar.'.$file_deposito->getClientOriginalExtension();
                    //$imgInfo = $file->getSize();
                    $file_deposito->move('../public/images', $idPost."deposito_gambar.".$file_deposito->getClientOriginalExtension());
                }
                $deposito->save();
            }
            return redirect('deposito')->with('pesan', $name.', deposito telah Anda perbarui.');
        }
        else{
        	$deposito->save();
            return redirect('deposito')->with('pesan', $name.', deposito telah Anda perbarui.');
        }
    }
}
