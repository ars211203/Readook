<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{
    // public function index()
    // {
    //     return view('auth.login');
    // }

    // public function customLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('list_user') //sau khi login tra ve list_user
    //             ->withSuccess('Signed in');
    //     }

    //     return redirect("login")->withSuccess('Tài khoản hoặc mật khẩu không chính xác');
    // }

    // public function registration()
    // {
    //     return view('auth.registration');
    // }

    // public function customRegistration(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6',
    //         'phone' => 'required',
    //         'image' => 'required', //image
    //     ]);
    //     $data = $request->all();
    //     if ($request->hasFile('image')) {
    //         $destination_path = 'public/images/users';
    //         $image = $request->file('image');
    //         $image_name = $image->getClientOriginalName();
    //         $path = $request->file('image')->storeAs($destination_path, $image_name);
    //         $data['image'] = $image_name;
    //     }
    //     $check = $this->create($data);

    //     return redirect("dashboard")->withSuccess('You have signed-in');
    // }

    // public function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'phone' => $data['phone'],
    //         'image' => $data['image'], //image
    //     ]);
    // }

    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         $users = User::all();
    //         $users = User::paginate(2);
    //         return view('layout.list_user', compact('users'));
    //     }
    //     return redirect("login")->withSuccess('You are not allowed to access');
    // }
    // public function signOut()
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return Redirect('login');
    // }
    // public function getUserById($id)
    // {
    //     $users = User::where('id', $id)->first();
    //     return view('layout.detail_user', compact('users'));
    // }
}