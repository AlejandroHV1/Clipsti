<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use App\Models\Usuario;

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

    public function vercomentarios(){
        
        $dato_comentario = Comentario::join('clip', 'comentario.fk_clip', '=', 'clip.pk_clip')
            ->join('usuario', 'comentario.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('comentario.*', 'usuario.*', 'clip.*')
            ->where('clip.estatus', '=', '1')
            ->get();

            return view('verclip',compact("dato_comentario"));
    }
    
}
