<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        $cari = $request->input('term');

        if($cari != null ){
            $books = DB::table('books')->where('name','like',"%".$cari."%")->paginate(10);
        }
        else {
        $books= DB::table('books')->paginate(10); }
        
        return view('home', ['books'=>$books]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->input('term');
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$books = DB::table('books')
		->where('name','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('home',['books' => $books]);
 
	}
}
