<?php

namespace App\Http\Controllers;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Validator;

//use App\Http\Controllers\Hash;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
class UserController extends Controller
{

    public function __construct()
    {

        return $this->middleware('auth');
    }




    public function index(){
        $listuser = User::all();
        return view('user.index', ['users' => $listuser]);

    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|alpha|max:255|email|unique:users',
            'password' => 'min:6|required_with:passwordConfirmed|same:passwordConfirmed',
            'passwordConfirmed' => 'min:6',
            'full_name' => 'required',
        ])->validate();
        $user = new User();
       // $user->username = Input::get('username');
         $user->name = $request->input('name');
         $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->full_name = $request->input('full_name');
        $user->last_login = auth()->user()->last_login ;
        $user->created_at = auth()->user()->created_at;
        $user->updated_at= auth()->user()->created_at;
        $user_deleted_at = auth()->user()->created_at;


        $user->save();
        return redirect('users');

    }
    public function edit($id){

        $user = User::find($id);
        return view('user.edit', ['user' => $user]);

    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->full_name = $request->input('full_name');
        $user->save();
        return redirect('users');
    }
    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect('users');

    }
}
