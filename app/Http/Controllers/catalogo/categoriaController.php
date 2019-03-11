<?php

namespace App\Http\Controllers\catalogo;

use App\models\categorias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use PHPUnit\Util\RegularExpression;

class categoriaController extends Controller
{
    public function index(){
        try{
            $user=Auth::user();

            $sql="select codigo, nombre, descripcion from productos_categoria where estado=1 and empresa=?;";

            $data=DB::select($sql,[$user->empresa]);

            return [
                'codigo'=>200,
                'data'=>$data
            ];

        }catch (Exception $e){
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
                $categoria=new categorias();
                $categoria->empresa=$user->empresa;
            }else{
                $categoria=categorias::find($r->codigo);
            }

            $categoria->nombre=$r->nombre;
            $categoria->descripcion=$r->descripcion;

            $categoria->estado=1;

            $categoria->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Listo'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>200,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function eliminar(Request $r){
        try{
            $categoria=categorias::find($r->codigo);

            $categoria->estado=0;

            $categoria->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Eliminado'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
