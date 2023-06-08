<?php

namespace App\Http\Controllers;

use App\Mail\ReadookEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::paginate(10);
        $i = (request()->input('page', 1) - 1) * 5;
        return view('books.index', compact('book','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $bookname = $data['book_name'];
        if ($request->hasFile('book_image')) {
            $destination_path = 'public/images/books';
            $image = $request->file('book_image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('book_image')->storeAs($destination_path, $image_name);
            $data['book_image'] = $image_name;
        }
            //goi ham test
        book::create($data);
        return redirect()->route('list.book')->with('thongbao', 'Thêm người dùng thành công');
    }
    public function test(){
        $name = "Người dùng";
            $emails = DB::table('users')->pluck('email');
            foreach ($emails as $datamail) {
                Mail::send('email.mail',compact('bookname','name'),function($email) use($name,$datamail){
                    $email->subject('Thư giới thiệu');
                    $email->to($datamail,$name);
                });
            } 
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('list.book', compact('book'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // Xóa sách từ bảng books
        $book = Book::find($id);
        $book->delete();
            
        return redirect()->route('list.book')->with('thongbao', 'Xóa sách thành công');
    }
    public function complete (Request $request, $id){
        $book = Book::find($id);
        $book->update(['book_status' => 1]);
        return redirect()->back()->with('thongbao', 'Đã cập nhật sách đã hoàn tất!');
    }
}
