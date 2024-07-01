<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table="comentario";
    protected $primaryKey = 'pk_comentario';
    public $timestamps=false;
}
