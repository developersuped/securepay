<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class tiendaController extends Controller
{
    public function index(){
        try
        {
            $sql="select  p.codigo publicacion,  u.name usuario, titulo, detalle, precio_venta, cantidad, prod.nombre producto, url imagen
                from publicacion p
                        join users u on p.user = u.codigo
                       join producto prod on p.producto = prod.codigo
                       left join image i on p.codigo = i.publicacion
                where p.estado = 1";

            $data=DB::select($sql);

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

    public function carritoAdd(Request $r){
        try{
            $user=Auth::user();
            $car=DB::table('carrito')->insertGetId(['user'=>$user->codigo]);

            $guardar=DB::table('carrito_detalle')->insert(['carrito'=>$car, 'publicacion'=>$r->publicacion]);

            return [
                'codigo'=>200,
                'mensaje'=>'Añadido'
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }

    public function carritoget(){
        try{
            $user=Auth::user();
            $sql="select cd.codigo, u.name, p.titulo, p.detalle, p.precio_venta
                from users u
                       join carrito c on u.codigo = c.user
                       join carrito_detalle cd on cd.carrito = c.codigo
                       join publicacion p on cd.publicacion = p.codigo
                where cd.esatdo = 1 and u.codigo=?;";

            $data=DB::select($sql,[$user->codigo]);

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
}
