<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\usuario;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class user extends Controller
{
    public function getData(){
        try{
            $sql_roles="select codigo value, nombre text from rol where estado=1";

            $roles=DB::select($sql_roles);

            return [
                'codigo'=>200,
                'roles'=>$roles
            ];


        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function getAvatar($filename){
        try{

            $user=Auth::user();

            $avatar=$user->imagen;

            $url = Storage::disk('user')->get($filename);
            //$img=Storage::disk('user')->get($avatar);

            $respuesta=Response($url, 200);

            return $respuesta;

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function editar(Request $r){
        try{
            $user=usuario::where('codigo', $r->codigo)->first();
            $user->name=$r->name;
            $user->lastname=$r->lastname;
            $user->email=$r->email;
            $user->direccion=$r->direccion;
            $user->edad=$r->edad;
            $user->rol=$r->rol;
            $user->dui=$r->dui;
            $user->telefono=$r->telefono;
            $user->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Editado'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage(),
                'line'=>$e->getLine(),
                'file'=>$e->getFile()
            ];
        }
    }

    public function desactivar(Request $r){
        try{
            $mensaje="";
            $user=usuario::where('codigo', $r->codigo)->first();

            if($user->estado==0){
                $user->estado=1;
                $mensaje="Activado";
            }else{
                $user->estado=0;
                $mensaje="Desactivado";
            }

            $user->save();

            return [
                'codigo'=>200,
                'mensaje'=>$mensaje
            ];
        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
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
                    'lastname'=>$user->lastname,
                    'email'=>$user->email,
                    'direccion'=>$user->direccion,
                    'image'=>$user->imagen,
                    'edad'=>$user->edad,
                    'dui'=>$user->dui,
                    'telefono'=>$user->telefono
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

    public function subirAvatar(Request $r){
        try{
            $user=Auth::user();
            $file=$r->file('avatar');

            if($file){
                $file_full_name=time().$file->getClientOriginalName();

                Storage::disk('user')->put($file_full_name, File::get($file));

                DB::table('users')
                    ->where('codigo', $user->codigo)
                    ->update(['imagen' => $file_full_name]);
            }

            return [
                'codigo'=>200,
                'mensaje'=>$file
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function getUsers(Request $r){
        try{
            $sql="select u.codigo, name, u.estado, lastname, email, direccion, edad, dui, r.nombre rol, r.codigo rol_ref from users u join rol r on u.rol = r.codigo";

            $data=DB::select($sql);

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
