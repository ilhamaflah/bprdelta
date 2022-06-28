<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Gambarpost;
use App\User;
use Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(5);
        $gambar = Gambarpost::all();

        return view('berita', compact("post", "gambar"));
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

        $name = Auth::user()->name;
        //$name = $file->getClientOriginalExtension();
        $file = $request->file('photo');
        $judul = $request->get('judul');
        $deskripsi = $request->get('deskripsi');

        $post = new Post();
        $post->judul = $judul;
        $post->deskripsi = $deskripsi;
        $post->tanggal = date("Y-m-d H:i:s");
        $post->user_id = $userid;

        $post->save();

        $idPost = Post::max('id');

        $gambarpost = new Gambarpost();

        if(file_exists('../public/images/post/')){}
        else{
            mkdir('../public/images/post/');
        }
        if(file_exists('../public/images/post/'.$idPost.".".$gambarpost->extension)){
            unlink('../public/images/post/'.$idPost.".".$gambarpost->extension);
            $gambarpost->post_id = $idPost;
            $gambarpost->extension = $file->getClientOriginalExtension();
            //$imgInfo = $file->getSize();
            $file->move('../public/images/post', $idPost.".".$file->getClientOriginalExtension());
            $gambarpost->save();
        }
        else{
            $gambarpost->post_id = $idPost;
            $gambarpost->extension = $file->getClientOriginalExtension();
            //$imgInfo = $file->getSize();
            $file->move('../public/images/post', $idPost.".".$file->getClientOriginalExtension());
            $gambarpost->save();
        }

        return redirect('berita')->with('pesan', $name.', berita telah Anda tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newid = str_replace('+', ' ', $id);
        $post = Post::where('judul', $newid)->first();
        $gambar = Gambarpost::where('post_id', $post->id)->first(); //Gambarpost::find($post->id);
        $post_2 = Post::orderBy('updated_at','desc')->limit(3)->get();
        $gambar_2 = Gambarpost::all();
        return view('berita.detail', compact('post', 'gambar', 'post_2', 'gambar_2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $gambar = Gambarpost::where('post_id', $id)->first();
        return view('berita.edit', compact('post', 'gambar'));
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
        $userid = Auth::user()->id;

        $name = Auth::user()->name;
        //$name = $file->getClientOriginalExtension();
        $file = $request->file('photo');
        $judul = $request->get('judul');
        $deskripsi = $request->get('deskripsi');

        $post = Post::find($id);
        $post->judul = $judul;
        $post->deskripsi = $deskripsi;
        $post->tanggal = date("Y-m-d H:i:s");
        $post->user_id = $userid;

        $post->save();

        $idPost = $id;

        //$gambarpost = Gambarpost::find($idPost);
        $gambarpost = Post::with('gambarpost')->find($id)->gambarpost;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/post/'.$idPost.".".$gambarpost->extension)){
                unlink('../public/images/post/'.$idPost.".".$gambarpost->extension);
                $gambarpost->post_id = $idPost;
                $gambarpost->extension = $file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images/post', $idPost.".".$file->getClientOriginalExtension());
                $gambarpost->save();
            }
            else{
                $gambarpost->post_id = $idPost;
                $gambarpost->extension = $file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images/post', $idPost.".".$file->getClientOriginalExtension());
                $gambarpost->save();
            }
            
            return redirect('berita')->with('pesan', $name.', berita telah Anda perbarui.');
        }
        else{
            return redirect('berita')->with('pesan', $name.', berita telah Anda perbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idPost = $id;
        $gambarpost = Post::with('gambarpost')->find($id)->gambarpost;

        if(file_exists('../public/images/post/'.$idPost.".".$gambarpost->extension)){
            unlink('../public/images/post/'.$idPost.".".$gambarpost->extension);
            $gambarpost->delete();
            $post = Post::find($id);
            $judul = $post->judul;
            $post->delete();
        }
        else{
            $gambarpost->delete();
            $post = Post::find($id);
            $judul = $post->judul;
            $post->delete();
        }

        return redirect('berita')->with('pesan','Berita dengan judul "'.$judul.'" telah Anda hapus.');
    }
}
