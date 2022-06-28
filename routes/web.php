<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $post = App\Post::orderBy('updated_at','desc')->limit(3)->get();
    $home = App\Home::all();
    $gambar = App\Gambarpost::all();
    $tabungan = App\Tabungan::find(1);
    $deposito = App\Deposito::find(1);
    $kredit = App\Kredit::find(1);
    $tentang = App\Tentang::find(1);
    return view('index', compact('post', 'gambar', 'tabungan', 'deposito', 'kredit', 'home', 'tentang'));
});


// Route::get('/', function () {
// 	$post = App\Post::orderBy('updated_at','desc')->limit(3)->get();
// 	$gambar = App\Gambarpost::all();
// 	$tabungan = App\Tabungan::find(1);
// 	$deposito = App\Deposito::find(1);
// 	$kredit = App\Kredit::find(1);
//     return view('index', compact('post', 'gambar', 'tabungan', 'deposito', 'kredit'));
// });

/*Route::get('/tentang', function(){
	return view('tentang');
});*/

/*Route::get('/deposito', function(){
	return view('deposito');
});*/

/*Route::get('/tabungan', function(){
	$tabungan = App\Tabungan::find(1);
	return view('tabungan', compact('tabungan'));
});*/

/*Route::get('/kredit', function(){
	return view('kredit');
});*/

Route::get('/cp', function(){
	return view('cp');
});

Route::get('/admin', function(){
	return view('admin');
});

Auth::routes();

Route::resource('home','HomeController', ['middleware' => 'auth']);
Route::resource('dokumen', 'InputDocController', ['middleware' => 'auth']);
Route::resource('registeruser', 'RegisUserController', ['middleware' => 'auth']);
Route::resource('berita', 'BeritaController');
Route::resource('tabungan', 'TabunganController');
Route::resource('typetabungan', 'TypetabunganController');
Route::resource('deposito', 'DepositoController');
Route::resource('kredit', 'KreditController');
Route::resource('typekredit', 'TypekreditController');
Route::resource('tentang', 'TentangController');