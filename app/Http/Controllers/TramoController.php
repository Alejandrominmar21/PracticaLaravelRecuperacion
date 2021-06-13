<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramo;
use App\Models\Actividad;
use Spipu\Html2Pdf\Html2Pdf;

class TramoController extends Controller
{
    public function index(){

        $tramos = Tramo::all();
        $actividades = Actividad::all();

        $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
        $horas = ["07:00", "07:30", "08:00", "08:30", "09:00", "09:30",  "10:00", "10:30",  "11:00", "11:30",  "12:00", "12:30",  "13:00", "13:30",  "14:00", "14:30",
        "15:00", "15:30",  "16:00", "17:30",  "18:00", "18:30",  "19:00", "19:30",  "20:00", "20:30",  "21:00", "21:30", "22:00", "22:30"];
        
        return view('tramos.index', compact('tramos', 'dias' , 'horas'));
    }

    public function pdf(){
        $tramos = Tramo::all();
        $actividades = Actividad::all();

        $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
        $horas = ["07:00", "07:30", "08:00", "08:30", "09:00", "09:30",  "10:00", "10:30",  "11:00", "11:30",  "12:00", "12:30",  "13:00", "13:30",  "14:00", "14:30",
        "15:00", "15:30",  "16:00", "17:30",  "18:00", "18:30",  "19:00", "19:30",  "20:00", "20:30",  "21:00", "21:30", "22:00", "22:30"];
        
        
        ob_start();
        
        echo view('tramosPdf', compact('tramos', 'dias' , 'horas'));
        $content = ob_get_clean();

        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($content);
        $html2pdf->output('horario.pdf');
        exit();
        // return view('tramosPdf', compact('tramos', 'dias' , 'horas'));
    }
    public function create(){
        $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
        $horas = ["07:00", "07:30", "08:00", "08:30", "09:00", "09:30",  "10:00", "10:30",  "11:00", "11:30",  "12:00", "12:30",  "13:00", "13:30",  "14:00", "14:30",
        "15:00", "15:30",  "16:00", "17:30",  "18:00", "18:30",  "19:00", "19:30",  "20:00", "20:30",  "21:00", "21:30", "22:00", "22:30"];
        $actividades = Actividad::all();

        return view('tramosPdf', compact('dias' , 'horas', 'actividades'));
    }

    
    public function store(Request $request){
        $tramo = new Tramo();

        $tramo->dia = $request->dia;
        $tramo->horainicio = $request->horainicio;
        $tramo->horafin = $request->horafin;
        $tramo->actividad_id = $request->actividad_id;
        if($tramo->horainicio > $tramo->horafin || $tramo->horainicio == $tramo->horafin){
            echo("Datos incorrectos");
        }else{
            if(TramoController::ocupado($tramo)==false){
                $tramo->save();

                return redirect()->route('tramos');
            }else{
                echo("Está ocupado");
            }
        }

    }

    public static function imprimirActividad($id){
        $actividad = Actividad::find($id);

        return $actividad->nombre;
    }

    public function destroy(Tramo $tramo){
        $tramo->delete();

        return redirect()->route('tramos');
    }
    
    static public function ocupado(Tramo $tramo){
        $tramos = Tramo::all();
        foreach ($tramos as $element) {
            if($element->horainicio == $tramo->horainicio || $element->horafin == $tramo->horafin ||
            $element->horainicio == $tramo->horafin || $element->horafin == $tramo->horainicio){
                return true;
            }
            if($element->horainicio < $tramo->horainicio && $element->horafin > $tramo->horainicio){
                return true;
            }
            if($element->horafin < $tramo->horainicio && $element->horafin > $tramo->horafin){
                return true;
            }
        }
        return false;
    }

}
