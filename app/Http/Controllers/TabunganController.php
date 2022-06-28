<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabungan;
use App\Typetabungan;
use App\User;
use Auth;

class TabunganController extends Controller
{
	public function index()
    {
        $tabungan = Tabungan::find(1);
        $typetabungan = Typetabungan::all();

		return view('tabungan', compact('tabungan', 'typetabungan'));
    }

    public function edit($id)
    {
        $tabungan = Tabungan::where('id', 1)->first();
        return view('tabungan.edit', compact('tabungan'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $keterangan = $request->get('keterangan');
        $manfaat = $request->get('manfaat');
        $syarat_orang = $request->get('syarat_orang');
        $syarat_perusahaan = $request->get('syarat_perusahaan');

        $tabungan = Tabungan::find($id);
        $tabungan->keterangan = $keterangan;
        $tabungan->manfaat = $manfaat;
        $tabungan->syarat_orang = $syarat_orang;
        $tabungan->syarat_perusahaan = $syarat_perusahaan;
        $tabungan->user_id = $userid;

        $idPost = $id;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/'.$tabungan->banner)){
                unlink('../public/images/'.$tabungan->banner);
                $tabungan->banner = $idPost.'tabungan.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."tabungan.".$file->getClientOriginalExtension());
            }
            else{
                $tabungan->banner = $idPost.'tabungan.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."tabungan.".$file->getClientOriginalExtension());
            }
            $tabungan->save();
            return redirect('tabungan')->with('pesan', $name.', tabungan telah Anda perbarui.');
        }
        else{
        	$tabungan->save();
            return redirect('tabungan')->with('pesan', $name.', tabungan telah Anda perbarui.');
        }
    }
}
