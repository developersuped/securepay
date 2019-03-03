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
            $sql="select codigo, nombre name, url, icono icon, template from pagina where estado=1 and padre is null;";
            $data=DB::select($sql);

            foreach ($data as $h){

                $rutas['routes'][]=[
                    'path'=>$h->url,
                    'component'=>[
                        "template"=>"<$h->template></$h->template>"
                    ]
                ];

                $hijos=DB::select('select nombre name, url, icono icon, template from pagina where padre=? and estado=1;',[$h->codigo]);

                foreach ($hijos as $row){

                    $rutas['routes'][]=[
                        'path'=>$row->url,
                        'component'=>[
                            "template"=>$row->template
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
