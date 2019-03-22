<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\models\publicacion;

class publicacionController extends Controller
{
    public function index(){
        try{

            $data=DB::select('select titulo, detalle, precio_venta, cantidad, prod.nombre producto, url imagen
                from publicacion p
                       join producto prod on p.producto = prod.codigo
                       left join image i on p.codigo = i.publicacion
                where p.estado = 1;');


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

            $publicacion=new publicacion();

            $publicacion->user=$user->codigo;
            $publicacion->producto=$r->producto;
            $publicacion->titulo=$r->titulo;
            $publicacion->detalle=$r->detalle;
            $publicacion->precio_proveedor=$r->precio;
            $publicacion->precio_venta=(($r->precio*0.05)+$r->precio);
            $publicacion->cantidad=$r->cantidad;
            $publicacion->estado=1;
            $publicacion->save();

            return [
                'codigo'=>200,
                'mensaje'=>'PUblicacion Registrada'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
