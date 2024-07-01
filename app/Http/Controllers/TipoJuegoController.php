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
        
        // Guardar el tipo de juego
        $tipo_juego->save();
        

        
        return redirect(url('/'))->with('success', 'El tipo de juego a sido agregada correctamente');
    }

    public function juegoporcategoria($obtenercategoria) { 
        
        $categoria = Categoria::findOrFail($obtenercategoria);
        
        $juego_por_categoria = Tipo_juego::where('fk_categoria', $categoria->pk_categoria)
            ->where('estatus', 1)
            ->get();
    
        return view('listajuegoporcategoria', compact('juego_por_categoria'));
    }


    
}
