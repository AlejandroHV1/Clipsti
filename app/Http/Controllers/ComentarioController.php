<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use App\Models\Usuario;
use App\Models\Clip;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function agregarcomentario(Request $request){
        $comentario = new Comentario;

        $usuario = session('id');

        $comentario->nombre_com = $request->comentario;
        $comentario->fk_usuario = $usuario;
        $comentario->fk_clip = $request->pk_clip;

        $comentario->save();

        return redirect(url('/verclip/'.$request->pk_clip));
    }
  
    
}
