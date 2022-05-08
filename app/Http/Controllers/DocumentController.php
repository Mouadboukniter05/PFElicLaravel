<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Document;
use App\User;
class DocumentController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $doc = ($user->is_admin)?Document::all() : $user->documents;
            return view('document.index')->with('doc',$doc);
        }
    }

    public function create()
    {
        return view('document.create');
    }

    public function store(Request $request)
    {
            $doc = new Document;
            $doc ->cin = Auth::user()->cin;
            $doc ->user_id = Auth::user()->id;
            $doc ->types = implode (",",$request->p).",".$request->autre;
            $doc->save();
            return redirect()->route('document.index')->with('message', 'votre demande a été créée');

    }


    public function list($cin)
    {
        if(Auth::user()->is_admin){
            $doc = Document::where('cin','=',strtoupper($cin))->get();
            $user = User::where('cin','=',strtoupper($cin))->first();
            return view('document.list')->with('doc',$doc)->with('user',$user);
        }
        return redirect()->route('document.index')->with('message', 'vous ne pouvez pas acceder ce service');

    }

    public function edit($id)
    {
        $doc = Document::find($id);
        return view('document.edit')->with('doc', $doc);
    }


    public function update(Request $request, $id)
    {
        $doc =  Document::find($id);
        $doc ->types = implode (",",$request->p).",".$request->autre;
        $doc->save();
        return redirect()->route('document.index')->with('message', 'le document a été mis à jour avec succès');
    }

    public function recherche(Request $request){
        $this->validate( $request, [
            'cin'       => 'required|min:8|max:8',
        ]);

        if(strtoupper(Auth::user()->cin) != strtoupper($request->cin)){
            $doc = Document::where('cin','=',strtoupper($request->cin))->get();
            $user = User::where('cin','=',strtoupper($request->cin))->first();
            //dd($doc,$user);
            return view('document.show')->with('doc',$doc)->with('user',$user);
        }

        return redirect()->route('document.index')->with('message', 'vous ne pouvez pas chercher sur votre document');
    }
    public function valid($id){
        $doc = Document::find($id);
        if(Auth::user()->cin != $doc->cin){
            $doc->is_it_find =Auth::user()->id;
            $doc->save();
            return redirect()->route('document.index')->with('message', 'valider');
        }
        //Session::flash('success', 'vous ne pouvez pas chercher votre documents perdus');
        return redirect()->route('document.index')->with('message', 'vous ne pouvez pas valider!!!!!');
    }



    public function delete($id)
    {
        if(Auth::user()->is_admin){
            $doc =Document::find($id);
            $doc->delete();
            return redirect()->route('document.index');
        }
            return redirect()->route('document.index');
    }
}
