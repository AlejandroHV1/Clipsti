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

    public function listacategorias(){
        $todo_categorias = categoria::select('categoria.*')
        ->where('estatus', '=', '1')
        ->get();
        return view('listacategorias', compact("todo_categorias"));
    }

    public function eliminarcategoria($pk_categoria){
        $dato = categoria::find($pk_categoria);
        $dato -> estatus = 0;
        $dato -> save();

        return redirect(url('/listacategorias'));
    }

    public function editarcategoria($pk_categoria){
        $editarcategoria = categoria::find($pk_categoria);
        return view('editarcategoria', compact("editarcategoria"));

    }

    public function actualizarcategoria(Request $request, $pk_categoria) {
        // Validar los datos del formulario
        $request->validate([
            'nombre_categoria' => 'required|string',
            'descripcion_categoria' => 'required|string'
        ]);
  
        // aqui optenemos los datos de la categoria que se va a editar llamandola por el pk
        $categoria = Categoria::find($pk_categoria);
  
        // aqui es para actualizar los datos que ese optubieron del codigo de arriba pa
        $categoria->nombre_cat = $request->input('nombre_categoria');
        $categoria->descripcion_cat = $request->input('descripcion_categoria');
  
        $categoria->save();
  
        // Redirigir a la página de lista de instituciones o a donde desees
        return redirect(url('/listacategorias'));
    }

}