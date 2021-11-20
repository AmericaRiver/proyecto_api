<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


 
class Alumnos extends Model{
    protected $primaryKey = "id_alumno";
   
    protected $table = "alumnos";
    
    
    protected $fillable = [
        'folio', 'nombre', 'apellido_paterno','apellido_materno',
        'carrera',
        'sexo',
        'edad',
        'telefono',
        'correo',
        'club_alternativo',
        'alergias',
        'situacion_medica'
    ];

    public $timestamps = false;
} 