<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Tipo_juego;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function insertarcategoria(Request $request){
        $categoria = new Categoria();

        $categoria = new Categoria;
        $categoria->nombre_cat = $request->nombre_categoria;
        $categoria->estatus = 1;
        $categoria->descripcion_cat = $request->descripcion_categoria;   
        
        $categoria -> save();

        
        return redirect(url('/'))->with('success', 'Categoria agregada correctamente');
    }

    public function mostrarcategorias(){

        $dato_categorias = categoria::select('categoria.*')
        ->where('estatus', '=', '1')->get();
        

        $dato_tipos_juego = Tipo_juego::select('tipo_juego.*')
        ->where('estatus', '=', '1')->get();


        return view('explorar', compact("dato_categorias","dato_tipos_juego"));
    }

}