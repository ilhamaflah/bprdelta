<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Pegawai;
use App\Nasabah;
use App\User;
use App\Home;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::take(3)->get();
        $user = User::all();
        return view('home', compact("post", "user"));
    }

    public function edit($id)
    {
        $home = Home::all();
        return view('home.edit', compact('home', 'home'));
    }

    public function update(Request $request, $id)
    {
        $userid = Auth::user()->id;

        $name = Auth::user()->name;

        $file = $request->file('photo');
        $home = home::find($id);

        $idPost = $id;

        if ($request->hasFile('photo')) {
            if(file_exists('../public/images/'.$home->banner)){
                unlink('../public/images/'.$home->banner);
                $home->banner = $idPost.'home.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."home.".$file->getClientOriginalExtension());
            }
            else{
                $home->banner = $idPost.'home.'.$file->getClientOriginalExtension();
                //$imgInfo = $file->getSize();
                $file->move('../public/images', $idPost."home.".$file->getClientOriginalExtension());
            }
            $home->save();
            return redirect('/')->with('pesan', $name.', banner home telah Anda perbarui.');
        }
        else{
            $home->save();
            return redirect('/')->with('pesan', $name.', banner home telah Anda perbarui.');
        }
    }
}

// OLD
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Post;
// use App\Pegawai;
// use App\Nasabah;
// use App\User;

// class HomeController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         $post = Post::take(3)->get();
//         $user = User::all();
//         return view('home', compact("post", "user"));
//     }
// }
