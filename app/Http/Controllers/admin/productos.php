<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class productos extends Controller
{
    public function index(){
        try{
            $data=DB::select("select p.codigo,correlativo,p.nombre         producto,p.descripcion,c.nombre         categoria,precio_min_venta precio_min,cantidad,existencia,pv.nombre        proveedor from producto p join productos_categoria c on c.codigo = p.categoria join proveedor pv on pv.codigo = p.proveedor where c.estado = 1;");
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
