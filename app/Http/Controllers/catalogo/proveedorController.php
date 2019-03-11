<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\proveedores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class proveedorController extends Controller
{
    public function index(){
        try{
            $user=Auth::user();

            $sql="select codigo, nombre, nit, direccion, telefono, representante from proveedor where estado=1 and empresa=?;";

            $data=DB::select($sql,[$user->empresa]);

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

    public function registrar(Request $r){
        try{

            $user=Auth::user();

            if($r->codigo==null){
                $proveedor=new proveedores();
            }else{
                $proveedor=proveedores::find($r->codigo);
            }

            $proveedor->nombre=$r->nombre;
            $proveedor->nit=$r->nit;
            $proveedor->direccion=$r->direccion;
            $proveedor->telefono=$r->telefono;
            $proveedor->representante=$r->representante;
            $proveedor->empresa=$user->empresa;
            $proveedor->estado=1;
            $proveedor->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Registrado Correctamente'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function eliminar(Request $r){
        try{
            $provedor=proveedores::find($r->codigo);

            $provedor->estado=0;
            $provedor->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Eliminado Correctamente'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
