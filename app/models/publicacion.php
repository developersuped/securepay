<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
    protected $primaryKey="codigo";
    protected $table="publicacion";
    public $timestamps=false;
}
