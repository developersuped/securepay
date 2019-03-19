<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class proveer extends Controller
{
    public function index(){
        try{

            $user=Auth::user();

            $sql="select pp.codigo, p.nombre producto, p.descripcion, p2.nombre categoria  from producto_proveedor pp join producto p on pp.producto = p.codigo
join productos_categoria p2 on p.categoria = p2.codigo where pp.proveedor=? and pp.estado=1;";

            $sql_productos="select codigo value, nombre text from producto where estado=1;";

            $data=DB::select($sql,[$user->id]);
            $data_productos=DB::select($sql_productos);

            return [
                'codigo'=>200,
                'data'=>$data,
                'productos'=>$data_productos
            ];

        }catch (Exception $e){
            return [
                'codigo'=>500,
                'mensaje'=>$e->getMessage()
            ];
        }
    }
}
