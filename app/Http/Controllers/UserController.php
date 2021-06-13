<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        if($request->rol && $request->buscarpor){
            $nombre = $request->get('buscarpor');
            
            if($request->rol == "todos"){
                $usuarios = User::where('name', 'like',  "%$nombre%")->orderBy($request->ordenar , 'asc')->paginate();
            }else{
                $usuarios = User::where('rol', '=',  $request->rol)->where('name', 'like',  "%$nombre%")->orderBy($request->ordenar , 'asc')->paginate();
            }

        }elseif($request->rol){
            if($request->rol == "todos"){
                $usuarios = User::orderBy($request->ordenar , 'asc')->paginate();
            }else{
                $usuarios = User::where('rol', '=',  $request->rol)->orderBy($request->ordenar , 'asc')->paginate();
            }
            
        }else{
            $usuarios = User::paginate();
        }

        return view('users.index', compact('usuarios'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $usuario = new User();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->avatar =  $_FILES['avatar']['name'];
        $usuario->password = Hash::make($request->password);
        $usuario->rol = $request->rol;

        $archivo = $_FILES['avatar']['tmp_name'];
        $ruta = "./img/perfiles/".$_FILES['avatar']['name'];
        move_uploaded_file($archivo, $ruta);

        $usuario->save();

        return redirect()->route('usuarios');
    }

    public function edit($id){
        $usuario = User::find($id);        

        return view('users.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario){
        
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->avatar = $_FILES['avatar']['name'];
        
        $usuario->password = Hash::make($request->password);
        $usuario->rol = $request->rol;

        $usuario->save();

        $archivo = $_FILES['avatar']['tmp_name'];
        $ruta = "./img/perfiles/".$_FILES['avatar']['name'];
        move_uploaded_file($archivo, $ruta);


        return redirect()->route('usuarios');
    }

    public function destroy(User $usuario){
        $usuario->delete();;

        return redirect()->route('usuarios');
    }
    
    
}
