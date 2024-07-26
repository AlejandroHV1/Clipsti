<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache; 
use Illuminate\Support\Facades\DB;
use App\Models\Clip;
use App\Models\Usuario;
use App\Models\Tipo_juego; 
use App\Models\Comentario;

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

        $usuario = Usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips += 1;
                $usuario->save();
            }

        return response()->json(['mensaje' => 'Clip subido, Ve a verlo en tu perfil!!!']);
    }

    public function clipporusuario(){
        $pkdelusuario = session('id');

        // esto es para que se pueda mostrar el nombre del usuario ya que 
        // con get es para el foreach y con foreach el usuario se repetiria siempre
        $usuario = usuario::where('pk_usuario', $pkdelusuario)->first();

        //el get es para los foreach
        $dato = Clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('clip.*','usuario.user')->where('clip.estatus', '=', '1')
            ->where('usuario.pk_usuario', $pkdelusuario)->get();
        return view('clipsusuario',compact("dato", "usuario"));
    }

    public function eliminarclip($pk_clip){
        $dato = Clip::find($pk_clip);
        $dato -> estatus=0;
        $dato -> save();
        

        $usuario = Usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips -= 1;
                $usuario->save();
            }

            return redirect(url('/clipusuario'));
    }

    public function ocultarclip($pk_clip){
        $dato = Clip::find($pk_clip);
        $dato -> estatus=2;
        $dato -> save();

        return redirect(url('/clipsocultos'));
    }

    public function verclipsocultos(){
        $pkdelusuario = session('id');

        //el get es para los foreach
        $dato_clipsocultos = Clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('clip.*','usuario.user')->where('clip.estatus', '=', '2')
            ->where('usuario.pk_usuario', $pkdelusuario)->get();
        return view('clipsocultos',compact("dato_clipsocultos"));
    }

    public function eliminarclip2($pk_clip){
        $dato = Clip::find($pk_clip);
        $dato -> estatus=0;
        $dato -> save();
        

        $usuario = Usuario::find(session('id'));
            if ($usuario) {
                $usuario->cantidad_clips -= 1;
                $usuario->save();
            }

            return redirect(url('/clipsocultos'));
    }

    public function desocultarclip($pk_clip){
        $dato = Clip::find($pk_clip);
        $dato -> estatus=1;
        $dato -> save();

        return redirect(url('/clipusuario'));
    }

    public function clipporjuego($obtenerjuego) { 
        
        $juego = Tipo_juego::findOrFail($obtenerjuego);
        
        $clipsporjuego = Clip::where('fk_tipojuego', $juego->pk_tipo_juego)
            ->where('estatus', 1)
            ->get();
    
        return view('listaclipsporjuego', compact('clipsporjuego', 'juego'));
    }


    public function visualizarclip($pk_clip){
        $dato_clip = Clip::find($pk_clip);

        $dato_comentario = Comentario::join('clip', 'comentario.fk_clip', '=', 'clip.pk_clip')
            ->join('usuario', 'comentario.fk_usuario', '=', 'usuario.pk_usuario')
            ->select('comentario.*', 'usuario.*', 'clip.*')
            ->where('comentario.fk_clip', '=', $pk_clip) 
            ->where('clip.estatus', '=', '1')
            ->get();

            return view('verclip', compact('dato_clip', 'dato_comentario'));

    }


    //esto es apra que sea aleatorio
    public function verclipcarrusel()
        {
            $cacheKey = 'clips_carrusel';
            $cacheDuration = 60 * 60 * 24; // 24 horas

            $clips_carrusel = Cache::store('file')->remember($cacheKey, $cacheDuration, function () {
                return Clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario')
                    ->select('clip.*', 'usuario.user')
                    ->where('clip.estatus', 1)
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
            });

            // para mostrar lo demas del index
            $clips_index = Clip::join('usuario', 'clip.fk_usuario', '=', 'usuario.pk_usuario') 
                ->select('clip.*', 'usuario.user') 
                ->where('clip.estatus', 1)
                ->orderByDesc('clip.pk_clip')
                ->limit(6)
                ->get();

            return view('index', compact('clips_carrusel' , 'clips_index'));
        }

    public function editarclip($pk_clip){
        $dato_clip = Clip::find($pk_clip);

        $dato_fks = Clip::join('categoria', 'clip.fk_categoria', '=', 'categoria.pk_categoria')
        ->join('tipo_juego', 'clip.fk_tipojuego', '=', 'tipo_juego.pk_tipo_juego')
        ->select('clip.*', 'categoria.*', 'tipo_juego.*');
        return view('editarclip', compact('dato_clip', 'dato_fks'));
    }

    public function actualizarclip(Request $request, $pk_clip){
        $clip_editar = Clip::find($pk_clip);

        $clip_editar->nombre_clip = $request->input ('nuevo_nombre_clip');
        $clip_editar->descripcion_clip = $request->input ('nuevo_descripcion_clip');

        if ($request->hasFile('nuevo_clip')) {
            $nuevo_clip_file = $request->file('nuevo_clip');
            $nuevo_rutavideo = $nuevo_clip_file->store('public/videos');
            $clip_editar->video = str_replace('public/', '', $nuevo_rutavideo);
        }

        $clip_editar->fk_categoria = $request->input ('nuevo_categoria');
        $clip_editar->fk_tipojuego = $request->input ('nuevo_tipojuego');

        $clip_editar->save();

        return redirect(url('/clipusuario'));
    }

}

