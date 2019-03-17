<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\models\mProducto;


class producto extends Controller
{
    public function index(){
        try{

            $user=Auth::user();
            $sql="select codigo, nombre, descripcion, categoria, empresa from producto where estado=1  and  empresa=?;";

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

    public function getData(){
        try{
            $user=Auth::user();

            $sql_proveedores="select codigo value, nombre text from proveedor where estado=1 and empresa=?;";

            $sql_categoria="select codigo value, nombre text from productos_categoria where estado=1 and empresa=?;";

            $data_proveedores=DB::select($sql_proveedores, [$user->empresa]);

            $data_categoria=DB::select($sql_categoria, [$user->empresa]);

            return [
                'codigo'=>200,
                'proveedores'=>$data_proveedores,
                'categorias'=>$data_categoria
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
                $pruducto=new mProducto();
                $pruducto->empresa=$user->empresa;
            }else{
                $pruducto=mProducto::find($r->codigo);
            }
            $pruducto->nombre=$r->nombre;
            $pruducto->descripcion=$r->descricion;
            $pruducto->categoria=$r->categoria;
            $pruducto->estado=1;
            $pruducto->save();

            return [
                'codigo'=>200,
                'mensaje'=>'Registrado Correcatmente'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
