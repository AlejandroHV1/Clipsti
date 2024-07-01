<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{
    use HasFactory;
    protected $table="clip";
    protected $primaryKey = 'pk_clip';
    public $timestamps=false;
}
