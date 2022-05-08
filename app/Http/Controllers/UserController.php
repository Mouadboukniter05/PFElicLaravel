<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Document;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
class UserController extends Controller
{
    public function index()
    {

        if (Auth::check())
            {
                if(Auth::user()->is_admin){
                    $users =  User::all();
                    return view('user.index')->with('users',$users);
                }else{
                    return redirect()->route('document.index');
                }
            }
            return redirect()->route('document.index');

    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate( $request, [
            'cin'       => 'required|unique:users,cin|min:8|max:8',
            'nom'       => 'required',
            'password'  => 'required|min:8',
            'prenom'    => 'required',
            'email'     => 'required|unique:users,email',
            'tel'       => 'required|min:10|max:10',
        ]);
        $user = new User();
        $user ->cin = strtoupper($request->cin);
        $user ->nom = $request->nom;
        $user ->password = Hash::make($request->password);
        $user ->prenom = $request->prenom;
        $user ->email =$request->email;
        $user ->tel =$request->tel;
        $user->save();

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }


    public function update(Request $request,$id)
    {
        $useri =  User::where('id', '=', $id)->first();
        $this->validate( $request, [
            'nom'       => 'required',
            'prenom'    => 'required',
            'tel'       => 'required|min:10|max:10',
        ]);
        $useri ->nom = $request->nom;
        $useri ->prenom = $request->prenom;
        $useri ->tel =$request->tel;
        $useri->save();
        Session::flash('success', 'user was sucessfully updated');
        return redirect()->route('user.index');
    }


    public function destroy($id)
    {
        if(Auth::user()->is_admin){
            $user =User::find($id);
            $user->delete();
            return redirect()->route('user.index');
        }
            return redirect()->route('document.index');
    }
}
