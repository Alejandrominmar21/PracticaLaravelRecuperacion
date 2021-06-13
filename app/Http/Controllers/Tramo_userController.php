<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramo_user;


class Tramo_userController extends Controller
{
    public function index(){

        $idUsuario= auth()->user()->id;
        // $reservas = $Usuario->tramos;
        $reservas = Tramo_user::where('user_id', $idUsuario)->get();

        return view('misActividades', compact('reservas'));
    }

    public function store(Request $request){
        $reserva = new Tramo_user();

        $reserva->user_id = auth()->user()->id;
        $reserva->tramo_id = $request->tramo_id;      
        
        if(Tramo_userController::comprobarSiExiste($reserva->tramo_id)==false){
            $reserva->save();
            return redirect()->route('tramo_user'); 
        }else{
            echo("ya existe");
        }            
    }

    public function destroy(Tramo_user $Tramo_user){
        $Tramo_user->delete();

        return redirect()->route('tramo_user');
    }

    static public function comprobarSiExiste($id){//mira si el tramo ya está reservado
        $idUsuario= auth()->user()->id;
        $reservas = Tramo_user::where('user_id', $idUsuario)->get();

        foreach ($reservas as $reserva) {
            if($reserva->tramo_id==$id){
                return true;
            }
        }
        return false;
    }
}
