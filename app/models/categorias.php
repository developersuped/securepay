<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $table="productos_categoria";
    protected $primaryKey="codigo";
    public $timestamps=false;
}
