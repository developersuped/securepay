<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    protected $table="users";
    protected $primaryKey="codigo";
    public $timestamps=false;
}
