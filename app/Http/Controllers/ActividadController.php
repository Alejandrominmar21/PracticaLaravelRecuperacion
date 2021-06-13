<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
{
    public function index(Request $request){
        
        if($request->buscarpor){
            $nombre = $request->buscarpor;
            if($request->ordenar == "nombre" || $request->ordenar == "aforo"){
                $actividades = Actividad::where('nombre', 'like',  "%$nombre%")->orderBy($request->ordenar , 'asc')->paginate();

            }else{
                $actividades = Actividad::where('nombre', 'like',  "%$nombre%")->paginate();
            }    

            return view('actividades.index', compact('actividades'));
        }else{
            if($request->ordenar == "nombre" || $request->ordenar == "aforo"){
                $actividades = Actividad::orderBy($request->ordenar , 'asc')->paginate();

            }else{
                $actividades = Actividad::paginate();
            }    

            return view('actividades.index', compact('actividades'));
        }
    }

    

    public function create(){
        return view('actividades.create');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:20',
            'aforo' => 'required|max:2',
        ]);

        $actividad = new Actividad();

        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->aforo = $request->aforo;

        $actividad->save();

        return redirect()->route('actividades');
    }

    public function edit($id){
        $actividad = Actividad::find($id);

        return view('actividades.edit', compact('actividad'));
    }

    public function update(Request $request, Actividad $actividad){
        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->aforo = $request->aforo;

        $actividad->save();

        return redirect()->route('actividades');
    }

    public function destroy(Actividad $actividad){
        $actividad->delete();;

        return redirect()->route('actividades');
    }
}
