<?php

namespace App\Http\Controllers;
use App\Models\Tipo_juego;
use App\Models\Categoria;

use Illuminate\Http\Request;

class TipoJuegoController extends Controller
{
    public function insertartipojuego(Request $request){
 
        $tipo_juego = new Tipo_juego;
        $tipo_juego->nombre_tipo_juego = $request->nombre_tipo_juego;
        $tipo_juego->estatus = 1;
        
        if ($request->hasFile('foto_tipo_juego')) {
            $imagen = $request->file('foto_tipo_juego');
            $rutaimagen = $imagen->store('public/images');
            $tipo_juego->portada = str_replace('public/', '', $rutaimagen);
        }
        
        $tipo_juego->fk_categoria = $request->nombre_categoria;
        
        $tipo_juego->save();
        
        return response()->json(['mensaje' => 'Juego agregado correctamente']);
    }

    public function juegoporcategoria($obtenercategoria) { 
        
        $categoria = Categoria::findOrFail($obtenercategoria);
        
        $juego_por_categoria = Tipo_juego::where('fk_categoria', $categoria->pk_categoria)
            ->where('estatus', 1)
            ->get();
    
        return view('listajuegoporcategoria', compact('juego_por_categoria'));
    }

    public function listajuegos(){
        $lista_juegos = Tipo_juego::join('categoria', 'tipo_juego.fk_categoria', '=', 'categoria.pk_categoria')
        ->select('tipo_juego.*' , 'categoria.pk_categoria')
        ->where('tipo_juego.estatus', '=', '1')
        ->get();
        return view('listajuegos', compact("lista_juegos"));
    }

    public function eliminarjuego($pk_tipo_juego){
        $dato = Tipo_juego::find($pk_tipo_juego);
        $dato -> estatus = 0;
        $dato -> save();

        return redirect(url('/listajuegos'));
    }

    public function editarjuego($pk_tipo_juego){
        $editarjuego = Tipo_juego::find($pk_tipo_juego);
        return view('editarjuego', compact("editarjuego"));
    }

    public function actualizarjuego(Request $request, $pk_tipo_juego) {
        // Validar los datos del formulario
        //lo quite por pedos de que no agarra la imagen
        // $request->validate([
        //     'nuevo_tipo_juego' => 'required|string',
        //     'nuevo_portada' => 'required|image',
        //     'nuevo_categoria' => 'required|string'
        // ]);
  
        // aqui optenemos los datos de la categoria que se va a editar llamandola por el pk
        $juego = Tipo_juego::find($pk_tipo_juego);
  
        
        // aqui es para actualizar los datos que ese obtubieron del codigo de arriba pa
        $juego->nombre_tipo_juego = $request->input('nuevo_tipo_juego');

        if ($request->hasFile('nuevo_portada')) {
            $imagen1 = $request->file('nuevo_portada');
            $rutaimagen = $imagen1->store('public/images');
            $juego->portada = str_replace('public/', '', $rutaimagen);
        }
        
        $juego->fk_categoria = $request->input('nuevo_categoria');
  
        $juego->save();
  
        return redirect(url('/listajuegos'));
    }

    
}
