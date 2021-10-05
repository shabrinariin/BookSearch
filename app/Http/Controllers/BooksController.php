<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function addBooks(Request $request)
    {
        $file = $request->file('images')->getClientOriginalName();
        $filename = time().$file;
        $path = public_path('/Uploads');
        if($request->hasFile('images')){
            $file = $request->file('images');
            $file->move($path, $filename);
        }
        else {
            dd('Request Hash No File!');
        }

        $data = [
            'name'=> $request->input('bookName'),
            'year'=> $request->input('tahunT'),
            'author'=> $request->input('author'),
            'summary'=> $request->input('Summary'),
            'publisher'=> $request->input('publishers'),
            'pageCount'=> $request->input('pageCount'),
            'readPage'=> $request->input('ReadPage'),
            'finished' =>'$pageCount' == '$readPage' ? true : false,
            'reading'=> '$readPage' > 0 ? true : false,
            'insertedAt'=> new DateTime(),
            'updatedAt' => new DateTime(),
            'images' => $filename
        ];
            
        if (DB::table('books')->where('name','=', $data['name'])->count() > 0 ){
            return redirect('home')->with('status', 'Books already recorded'); 
        }
        else {  
            DB::table('books')->insert($data);
            return redirect('home')->with('status', 'insert successfully');
        }

    }
    public function detailBook($id)
    {
        $booksdetail = DB::table('books')->where('id', $id)->get();
        return view ('details', ['booksDTL'=>$booksdetail]);
    }
    public function detailToUpdate($id)
    {
        $toedit = DB::table('books')->where('id', $id)->get();
        return view ('edit', ['toEdit'=>$toedit] );
    }
    public function updateBook(Request $request, $id){
        
      //  $book = DB::table('books')->where('id',$id);
        $old = DB::table('books')->where('id',$id)->select('images')->get();
        $ChecK = 0;

        if($request->file('images')){
            $file = $request->file('images')->getClientOriginalName();
            $filename = time().$file;
            $path = public_path('/Uploads');
        }

        if($request->hasFile('images')){
            $file = $request->file('images');
            $file->move($path, $filename);
            Storage::delete($old);
            $ChecK = 1;
        }
        else {
            dd('Request Hash No File!');
        }
        $data = [
            'name'=> $request->input('bookName'),
            'year'=> $request->input('tahunT'),
            'author'=> $request->input('author'),
            'summary'=> $request->input('Summary'),
            'publisher'=> $request->input('publishers'),
            'pageCount' => $request->input('pageCount'),
            'readPage'=> $request->input('ReadPage'),
            'finished' => '$pageCount' == '$readPage' ? true : false,
            'reading' => '$readPage' > 0 ? true : false,
            'updatedAt'=> new DateTime()
        ];
        if( $ChecK == 1){
            $data = ['images' => $filename];
            DB::table('books')->where('id',$id)->update($data);
            return redirect('home')->with('status', 'update successfully'); 
        }
        else {
            $data = ['images' => $old];
            DB::table('books')->where('id',$id)->update($data);
            return redirect('home')->with('status', 'Update with old image '); 
        }
    }
    public function deleteBook($id) {
        $query = DB::table('books')->where('id', $id)->select('images')->get();
        Storage::delete('Uploads/'.$query);
        DB::table('books')->where('id', $id)->delete();
        return redirect('home')->with('status', 'DELETE successfully'); 
    }
}