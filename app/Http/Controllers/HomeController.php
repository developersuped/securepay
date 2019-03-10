<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('index');
    }


    public function menu(){
        $menu=[];
        $rutas=[];
        try{

            $user=Auth::user();
            $sql="select distinct p.codigo, p.nombre name, url, icono icon, template from pagina p join rol_pagina rp on p.codigo = rp.pagina join rol r on rp.rol = r.codigo where rol=? and r.estado=1 and p.estado=1 and p.empresa=? and  p.padre is null;";
            $data=DB::select($sql,[$user->rol, $user->empresa]);

            foreach ($data as $h){

                $rutas['routes'][]=[
                    'path'=>$h->url,
                    'component'=>[
                        "template"=>"<$h->template></$h->template>"
                    ]
                ];

                $hijos=DB::select('select p.nombre name, url, icono icon, template from pagina p join rol_pagina rp on p.codigo = rp.pagina join rol r on r.codigo = rp.rol where padre=? and p.estado = 1 and r.codigo = ? and r.estado=1 and p.empresa=?;',[$h->codigo, Auth::id(), $user->empresa]);

                foreach ($hijos as $row){

                    $rutas['routes'][]=[
                        'path'=>$row->url,
                        'component'=>[
                            "template"=>"<$row->template></$row->template>"
                        ]
                    ];

                    unset($row->template);
                    $h->children[]=$row;
                }

                unset($h->codigo);
                unset($h->template);
                $menu[]=$h;
            }
            $user=Auth::user();

            $rutas['routes'][]=[
                'path'=>'/perfil',
                'component'=>[
                    'template'=>'<perfil></perfil>'
                ]
            ];

            return [
                'codigo'=>200,
                'menu'=>$menu,
                'rutas'=>$rutas,
                'user'=>$user->name
            ];
        }catch (Exception $e){

        }
    }
}
