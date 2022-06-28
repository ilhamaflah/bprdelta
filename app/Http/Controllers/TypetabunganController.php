<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typetabungan;
use App\Tabungan;
use Auth;

class TypetabunganController extends Controller
{
    public function edit($id)
    {
        $typetabungan = Typetabungan::where('tabungan_id', 1)->get();
        $tabungan = Tabungan::find(1);
        return view('typetabungan.edit', compact('typetabungan', 'tabungan'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $nama = $request->get('nama');
        $keterangan = $request->get('keterangan');

        $typetabungan = Typetabungan::find($id);
        $typetabungan->nama = $nama;
        $typetabungan->keterangan = $keterangan;

        $idPost = $id;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/'.$typetabungan->gambar)){
                unlink('../public/images/'.$typetabungan->gambar);
                $typetabungan->gambar = $idPost.'typetabungan.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."typetabungan.".$file->getClientOriginalExtension());
            }
            else{
                $typetabungan->gambar = $idPost.'typetabungan.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."typetabungan.".$file->getClientOriginalExtension());
            }
            $typetabungan->save();
            return redirect('tabungan')->with('pesan', $name.', jenis tabungan telah Anda perbarui.');
        }
        else{
        	$typetabungan->save();
            return redirect('tabungan')->with('pesan', $name.', jenis tabungan telah Anda perbarui.');
        }
    }
}
