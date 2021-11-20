<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;

class AlumnosController extends Controller{

    
    public function index(Request $req){
        return Alumnos::all();
    }

    public function get($id_alumno){
        $result = Alumnos::find($id_alumno);
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }

    public function create (Request $req){
        $this->validate($req, [ 
            'nombre'=>'required',
            'apellido_paterno'=>'required',
            'apellido_materno'=>'required',
            'carrera'=>'required',
            'sexo'=>'required',
            'edad'=>'required',
            'telefono'=>'required',
            'correo'=>'required',
            'club_alternativo'=>'required',
            'alergias'=>'required',
            'situacion_medica'=>'required']);
        $datos = new Alumnos;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }

    public function update (Request $req, $id_alumno){
        
        $this->validate($req, [ 
            'nombre'=>'filled',
            'apellido_paterno'=>'filled',
            'apellido_materno'=>'filled',
            'carrera'=>'filled',
            'sexo'=>'filled',
            'edad'=>'filled',
            'telefono'=>'filled',
            'correo'=>'filled',
            'club_alternativo'=>'filled',
            'alergias'=>'filled',
            'situacion_medica'=>'filled']);

            $datos = Alumnos::find($id_alumno);
            if(!$datos) return response()->json(['status'=>'failed'], 404);
            $result = $datos->fill($req->all())->save();
            if($result)
                return response()->json(['status'=>'success'], 200);
            else
                return response()->json(['status'=>'failed'], 404);

    }

    public function destroy ($id_alumno){
        $datos = Alumnos::find($id_alumno);
        if(!$datos) return response()->json(['status'=>'failed'], 404);
        $result = $datos->delete();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);

    }

   /* //public function guardar (Request $request){
        $datosAlumno = new Alumnos;

        $datosAlumno->folio=$request->folio;
        $datosAlumno->nombre=$request->nombre;

        $datosAlumno->save();
        return response()->json($request);

    }*/
}