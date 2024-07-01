<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacidad extends Model
{
    use HasFactory;
    protected $table="clipprivacidad";
    protected $primaryKey = 'pk_privacidad';
    public $timestamps=false;
}
