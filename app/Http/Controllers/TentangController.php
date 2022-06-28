<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tentang;
use App\User;
use Auth;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::find(1);

		return view('tentang', compact('tentang'));
    }

    public function edit($id)
    {
        $tentang = Tentang::where('id', 1)->first();
        return view('tentang.edit', compact('tentang'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $thumb1 = $request->file('thumb1');
        $thumb2 = $request->file('thumb2');
        $sejarah = $request->get('sejarah');
        $visi = $request->get('visi');
        $misi = $request->get('misi');

        $tentang = Tentang::find($id);
        $tentang->sejarah = $sejarah;
        $tentang->visi = $visi;
        $tentang->misi = $misi;
        $tentang->user_id = $userid;

        $idPost = $id;
        if($request->hasFile('photo') || $request->hasFile('thumb1') || $request->hasFile('thumb2')){
	        if ($request->hasFile('photo')) {
	            if(file_exists('../public/images/'.$tentang->banner)){
	                unlink('../public/images/'.$tentang->banner);
	                $tentang->banner = $idPost.'tentang.'.$file->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $file->move('../public/images', $idPost."tentang.".$file->getClientOriginalExtension());
	            }
	            else{
	                $tentang->banner = $idPost.'tentang.'.$file->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $file->move('../public/images', $idPost."tentang.".$file->getClientOriginalExtension());
	            }
	        }
	        if ($request->hasFile('thumb1')) {
	            if(file_exists('../public/images/'.$tentang->thumb1)){
	                unlink('../public/images/'.$tentang->thumb1);
	                $tentang->thumb1 = $idPost.'tentangthumb1.'.$thumb1->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $thumb1->move('../public/images', $idPost."tentangthumb1.".$thumb1->getClientOriginalExtension());
	            }
	            else{
	                $tentang->thumb1 = $idPost.'tentangthumb1.'.$thumb1->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $thumb1->move('../public/images', $idPost."tentangthumb1.".$thumb1->getClientOriginalExtension());
	            }
	        }
	        if ($request->hasFile('thumb2')) {
	            if(file_exists('../public/images/'.$tentang->thumb2)){
	                unlink('../public/images/'.$tentang->thumb2);
	                $tentang->thumb2 = $idPost.'tentangthumb2.'.$thumb2->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $thumb2->move('../public/images', $idPost."tentangthumb2.".$thumb2->getClientOriginalExtension());
	            }
	            else{
	                $tentang->thumb2 = $idPost.'tentangthumb2.'.$thumb2->getClientOriginalExtension();
	                //$imgInfo = $file->getSize();
	                $thumb2->move('../public/images', $idPost."tentangthumb2.".$thumb2->getClientOriginalExtension());
	            }
	        }
	        $tentang->save();
            return redirect('tentang')->with('pesan', $name.', tentang kami telah Anda perbarui.');
        }
	    else{
	    	$tentang->save();
            return redirect('tentang')->with('pesan', $name.', tentang kami telah Anda perbarui.');
	    }
    }
}
