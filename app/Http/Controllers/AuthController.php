<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Instructores;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\JWT;

class AuthController extends Controller
{
    public function login($id_instructor,$password){
        // $this->validate($req, [
        //     'user'=>'required', 
        //     'pass'=>'required']);

        $result = Instructores::find($id_instructor);

        if($result){
            if (Hash::check($password, $result->password)){
                
                return response()->json([
                    'auth' => true,
                    'usuario' => $result,
                    'token' => JWT::create($result, env('JWT_SECRET', 'wGBSdbP8orgkXKRMHnOzC6IeWsG8rdXc'))
                ], 200);
            }else{
                return response()->json(['status'=>'failed no encryp'], 404);
            }
        }else{
            return response()->json(['status'=>'failed no coincidencias'], 404);
        }

    
    }
}