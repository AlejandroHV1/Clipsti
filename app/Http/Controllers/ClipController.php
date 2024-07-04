<?php

namespace App\Http\Controllers;
use App\Models\Clip;
use App\Models\Usuario;
use App\Models\Tipo_juego; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClipController extends Controller
{ 

    public function insertarclip(Request $request)
    {
        

        $clip = new Clip;
        $clip->nombre_clip = $request->titulo_clip;
        $clip->descripcion_clip = $request->descripcion_clip;
        $clip->estatus = 1;

        if ($request->hasFile('clip')) {
            $clip_file = $request->file('clip');
            $rutavideo = $clip_file->store('public/videos');
            $clip->video = str_replace('public/', '', $rutavideo);
        }

        $clip->fk_categoria = $request->categoria;
        $clip->fk_tipojuego = $request->tipojuego;
        $clip->fk_usuario = session('id');
        $clip->save();

        $usuario = usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips += 1;
                $usuario->save();
            }

        return redirect(url('/'))->with('success', 'clip agregado correctamente');
    }

    public function clipporusuario(){
        $pkdelusuario = session('id');

        // esto es para que se pueda mostrar el nombre del usuario ya que 
        // con get es para el foreach y con foreach el usuario se repetiria siempre
        $usuario = usuario::where('pk_usuario', $pkdelusuario)->first();

        //el get es para los foreach
        $dato = clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('clip.*','usuario.user')->where('clip.estatus', '=', '1')
            ->where('usuario.pk_usuario', $pkdelusuario)->get();
        return view('clipsusuario',compact("dato", "usuario"));
    }

    public function eliminarclip($pk_clip){
        $dato = clip::find($pk_clip);
        $dato -> estatus=0;
        $dato -> save();
        

        $usuario = usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips -= 1;
                $usuario->save();
            }

            return redirect(url('/clipusuario'));
    }

    public function ocultarclip($pk_clip){
        $dato = clip::find($pk_clip);
        $dato -> estatus=2;
        $dato -> save();

        return redirect(url('/clipsocultos'));
    }

    public function verclipsocultos(){
        $pkdelusuario = session('id');

        //el get es para los foreach
        $dato_clipsocultos = clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('clip.*','usuario.user')->where('clip.estatus', '=', '2')
            ->where('usuario.pk_usuario', $pkdelusuario)->get();
        return view('clipsocultos',compact("dato_clipsocultos"));
    }

    public function eliminarclip2($pk_clip){
        $dato = clip::find($pk_clip);
        $dato -> estatus=0;
        $dato -> save();
        

        $usuario = usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips -= 1;
                $usuario->save();
            }

            return redirect(url('/clipsocultos'));
    }

    public function desocultarclip($pk_clip){
        $dato = clip::find($pk_clip);
        $dato -> estatus=1;
        $dato -> save();

        return redirect(url('/clipusuario'));
    }

    public function clipporjuego($obtenerjuego) { 
        
        $juego = Tipo_juego::findOrFail($obtenerjuego);
        
        $clipsporjuego = Clip::where('fk_tipojuego', $juego->pk_tipo_juego)
            ->where('estatus', 1)
            ->get();
    
        return view('listaclipsporjuego', compact('clipsporjuego'));
    }


    public function visualizarclip($pk_clip){
        $dato_clip = Clip::find($pk_clip);

        return view('verclip',compact("dato_clip"));
    }
    
}

