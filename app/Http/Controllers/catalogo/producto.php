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

            $sql="select p.codigo, p.correlativo, p.nombre, p.descripcion, pc.nombre categoria, pc.codigo categoria_ref from producto p join productos_categoria pc on p.categoria = pc.codigo where pc.estado=1 and p.estado=1;";

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

    public function getData(){
        try{
            $sql_proveedores="select codigo value, nombre text from proveedor where estado=1";

            $sql_categoria="select codigo value, nombre text from productos_categoria where estado=1;";

            $data_proveedores=DB::select($sql_proveedores);

            $data_categoria=DB::select($sql_categoria);

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

            if($r->codigo==null){
                $pruducto=new mProducto();
            }else{
                $pruducto=mProducto::find($r->codigo);
            }
            $pruducto->correlativo=$r->correlativo;
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

    public function eliminar(Request $r){
        try{
            $prodcuto=mProducto::find($r->codigo);

            $prodcuto->estado=0;

            $prodcuto->save();

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
