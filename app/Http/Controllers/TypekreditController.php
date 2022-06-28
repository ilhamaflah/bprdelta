<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typekredit;
use App\Kredit;
use Auth;

class TypekreditController extends Controller
{
    public function edit($id)
    {
        $typekredit = Typekredit::where('kredit_id', 1)->get();
        $kredit = Kredit::find(1);
        return view('typekredit.edit', compact('typekredit', 'kredit'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $nama = $request->get('nama');
        $keterangan = $request->get('keterangan');

        $typekredit = Typekredit::find($id);
        $typekredit->nama = $nama;
        $typekredit->keterangan = $keterangan;

        $idPost = $id;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/'.$typekredit->gambar)){
                unlink('../public/images/'.$typekredit->gambar);
                $typekredit->gambar = $idPost.'typekredit.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."typekredit.".$file->getClientOriginalExtension());
            }
            else{
                $typekredit->gambar = $idPost.'typekredit.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."typekredit.".$file->getClientOriginalExtension());
            }
            $typekredit->save();
            return redirect('kredit')->with('pesan', $name.', jenis kredit telah Anda perbarui.');
        }
        else{
        	$typekredit->save();
            return redirect('kredit')->with('pesan', $name.', jenis kredit telah Anda perbarui.');
        }
    }
}
