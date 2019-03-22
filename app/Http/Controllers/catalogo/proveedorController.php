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
            $sql="select codigo, name, lastname, email, direccion, dui, telefono from users where rol=4 and estado=1;";

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
