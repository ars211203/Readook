<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\follows;
use App\Models\reviews;
use App\Models\Section;
use App\Models\User;
use App\Models\UserReadHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Mail;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        $mostViewedBook = Book::orderBy('book_view', 'desc')->first();
        $book = Book::all();
        $book = Book::paginate(4);
        $new_book = Book::orderBy('created_at', 'desc')->paginate(4);
        return view('welcome',compact('book','new_book','mostViewedBook'));
    }
    public function detail($id){
        $book = Book::find($id);
        $book->increment('book_view');
        $Section = Section::where('book_id', $id)->get();
        $Section = Section::paginate(2);
        //check sach da doc
        $user_id = Auth::id();
        $book_id = $book->id;
        $last_read_page = request('last_read_page', 0);
        $user_read_history = new UserReadHistory;
        $user_read_history->user_id = $user_id;
        $user_read_history->book_id = $book_id;
        $user_read_history->last_read_page = $last_read_page;
        $user_read_history->save();
        return view('books.chitiet',compact('book','Section','reviews'));
    }
    public function sohwBookActive(){
        $book = Book::all();
        $book = Book::paginate(4);
        return view('book_status');
    }
    public function profile($id){
        if(Auth::check()){
            $user = User::find(Auth::id());
            return view('users.profile',compact('user'));
        }
    }
    public function change_password($id){
        $user = User::find($id);
        return view('users.change_password',compact('user'));
    }
    public function updatePassword(Request $request,$id)
    {
        $user = User::find($id);
        $user = Auth::user();
        $id = $user->id;
        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password'); 
        if (Hash::check($current_password, $user->password)) {
            $user->password= Hash::make($new_password); 
            $user->save();
            return view('users.profile',compact('user'))->with('success', 'Mật khẩu đã được cập nhật thành công!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }
    }
    public function search(Request $request)
    {
        $key = $request->input('key');
        $books = DB::table('books')
                    ->where('book_name','like', '%' . $key . '%')
                    ->orWhere('book_description', 'like', '%' . $key . '%')
                    ->get();
        $books = Book::paginate(4);
        return view('books.search', ['books' => $books, 'key' => $key]);
    }
    public function UserReadHistory(){
        $user_id = Auth::id();
        $user_read_history = UserReadHistory::where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->with('book')
            ->get();
        return view('users.readhistory',compact('user_read_history'));
    }
    public function ClearHistory(){
        $user_id = Auth::id();
        $user_read_history = UserReadHistory::where('user_id', $user_id)->delete();
        return redirect()->back()->with('success', 'Đã xóa toàn bộ lịch sử đọc.');
    }
    public function deleteHistory($history_id){
        $user_id = Auth::id();
        $history = UserReadHistory::where('user_id', $user_id)
        ->where('id', $history_id)
        ->delete();
        return redirect()->back()->with('success', 'Đã xóa');
    }
    public function followBook(Request $request)
    {
        $user_id = Auth::id(); // Lấy ID của người dùng hiện tại
        $book_id = $request->input('book_id'); // Lấy ID của cuốn sách từ request

        $follow = follows::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
        ]);
        return redirect()->back();
    }
    public function listFollow(){
        $user_id = Auth::id(); // Lấy ID của người dùng hiện tại
        $follows = follows::where('user_id', $user_id)->get(); // Lấy danh sách các cuốn sách đã follow
        $books = [];
        foreach ($follows as $follow) {
            $book = Book::find($follow->book_id);
            if ($book) {
                $books[] = $book;
            }
        }
        return view('users.follows',compact('books'));
    }
    public function unfollow($book_id){
        $user_id = Auth::id();
        follows::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->delete();
        return redirect()->back();
    }
    public function unfollowAll(){
        $user_id = Auth::id();
        follows::where('user_id', $user_id)
        ->delete();
        return redirect()->back();
    }
    public function Testmail(){
        $name = "Người dùng";
        Mail::send('emails.Sendmail',compact('name'),function($email)use($name){
            $email->subject('Thông báo sách mới!');
            $email->to('Hope211203@gmail.com',$name);
        });
    }

}
