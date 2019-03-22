<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class proveer extends Controller
{
    public function index()
    {
        try {

            $user = Auth::user();

            $sql = "select p.codigo, p.correlativo, p.nombre producto, p.descripcion, c.nombre categoria
from producto p
       join producto_proveedor pp on p.codigo = pp.producto
  join productos_categoria c on c.codigo=p.categoria
       join users u on pp.user = u.codigo
where u.codigo=? and p.estado=1 and pp.estado=1;";

            $sql_productos = "select codigo value, nombre text from producto
                where estado=1 and codigo not in (select producto from producto_proveedor where user = ?);";

            $data = DB::select($sql, [$user->codigo]);
            $data_productos = DB::select($sql_productos, [$user->codigo]);

            return [
                'codigo' => 200,
                'data' => $data,
                'productos' => $data_productos
            ];

        } catch (Exception $e) {
            return [
                'codigo' => 500,
                'mensaje' => $e->getMessage()
            ];
        }
    }

    public function guardar(Request $r)
    {
        try {
            $user = Auth::user();

            DB::table('producto_proveedor')->insert(['user' => $user->codigo, 'producto' => $r->producto, 'estado' => 1]);
            return [
                'codigo' => 200,
                'mensaje' => 'guardado'
            ];

        } catch (Exception $e) {
            return [
                'codigo' => 500,
                'mensaje' => $e->getMessage()
            ];
        }
    }

    public function getProductos()
    {
        try {
            $user = Auth::user();

            $data = DB::select('select p.codigo value, p.nombre text
                from producto p join producto_proveedor pp on p.codigo=pp.producto 
                where pp.user=? and pp.estado=1 ', [$user->codigo]);

            return [
                'codigo' => 200,
                'productos' => $data
            ];
        } catch (Exception $e) {
            return [
                'codigo' => 500,
                'mensaje' => $e->getMessage()
            ];
        }
    }
}
