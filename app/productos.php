<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    protected $fillable = ['nomb_Producto','desc_Producto','id_Invent','precio_Producto','mode_producto'];
    protected $primaryKey = 'id_Producto';

}

    
