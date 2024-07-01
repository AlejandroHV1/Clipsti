<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_clip extends Model
{
    use HasFactory;
    protected $table="categoria_clip";
    protected $primaryKey = 'pk_categoria_clip';
    public $timestamps=false;
}
