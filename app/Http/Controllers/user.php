<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\usuario;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class user extends Controller
{
    public function registrar(Request $r){
        try{

            $user=new usuario();

            $user->name=$r->name;
            $user->email=$r->email;
            $user->password=encrypt($r->password);
            $user->save();


        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage(),
                'line'=>$e->getLine(),
                'file'=>$e->getFile()
            ];
        }
    }


    public function perfil(){
        try{
            $user=Auth::user();

            return [
                'codigo'=>200,
                'data'=>[
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'image'=>$user->image
                ]
            ];
        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage(),
                'Line'=>$e->getLine(),
                'file'=>$e->getFile()
            ];
        }
    }
}
