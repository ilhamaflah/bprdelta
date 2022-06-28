<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kredit;
use App\Typekredit;
use App\User;
use Auth;

class KreditController extends Controller
{
    public function index()
    {
        $kredit = Kredit::find(1);
        $typekredit = Typekredit::all();

		return view('kredit', compact('kredit', 'typekredit'));
    }

    public function edit($id)
    {
        $kredit = Kredit::where('id', $id)->first();
        return view('kredit.edit', compact('kredit'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $keterangan = $request->get('keterangan');
        $syarat_pengajuan = $request->get('syarat_pengajuan');

        $kredit = Kredit::find($id);
        $kredit->keterangan = $keterangan;
        $kredit->syarat_pengajuan = $syarat_pengajuan;
        $kredit->user_id = $userid;

        $idPost = $id;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/'.$kredit->banner)){
                unlink('../public/images/'.$kredit->banner);
                $kredit->banner = $idPost.'kredit.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."kredit.".$file->getClientOriginalExtension());
            }
            else{
                $kredit->banner = $idPost.'kredit.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."kredit.".$file->getClientOriginalExtension());
            }
            $kredit->save();
            return redirect('kredit')->with('pesan', $name.', kredit telah Anda perbarui.');
        }
        else{
        	$kredit->save();
            return redirect('kredit')->with('pesan', $name.', kredit telah Anda perbarui.');
        }
    }
}
