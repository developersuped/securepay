<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\usuario;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

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

    public function getUsers(Request $r){
        try{
            $user=Auth::user();

            $sql="select u.codigo, name, lastname, email, direccion, edad, dui, r.nombre rol from users u join rol r on u.rol = r.codigo where r.empresa=?;";

            $data=DB::select($sql, [$user->empresa]);

            return [
                'codigo'=>200,
                'data'=>$data
            ];
        }catch (\Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
