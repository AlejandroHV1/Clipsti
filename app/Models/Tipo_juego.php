<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_juego extends Model
{
    use HasFactory;
    protected $table="tipo_juego";
    protected $primaryKey = 'pk_tipo_juego';
    public $timestamps=false;
}
