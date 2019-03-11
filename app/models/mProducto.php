<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class mProducto extends Model
{
    protected $table="producto";
    protected $primaryKey="codigo";
    public $timestamps=false;
}
