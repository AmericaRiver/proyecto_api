<?php   
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Instructores extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    protected $primaryKey = "id_instructor";

    protected $table = "instructores";

    protected $fillable = [
        'rol', 'nombre', 'apellido_paterno',
        'apellido_materno',
        'edad',
        'telefono',
        'correo',
        'usuario',
        'password'
    ];

    public $timestamps = false;
}