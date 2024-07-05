<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    //funcion de registrar usuario
    public function registrar(Request $request){
        $usuario = new Usuario();
        $usuario -> email=$request->correo;
        $usuario -> password=$request->contrasena;
        $usuario -> user=$request->usuario;
        $usuario -> estatus = 1;
        $usuario -> fk_tipo_usuario = 2;

        $usuario -> save();
        return redirect(url('/iniciarsesion'))->with('success', 'El usuario a sido agregada correctamente');
    }

    public function login(Request $request)
    {
        $nombre = $request->input('nombreUsuario');
        $contraseña = $request->input('contrasena');
    
        $usuario = $this->buscar($nombre,$contraseña);
    
        if ($usuario) {
            // Establecer las variables de sesión
            session([
                'id' => $usuario->pk_usuario,
                'nombre' => $usuario->user,
                'contraseña' => $contraseña,
                'fk_tipo_usuario' => $usuario->fk_tipo_usuario
            ]);

            /*para verificar si si funciona
             dd($usuario->fk_tipo_usuario);
             */

            if ($usuario->fk_tipo_usuario == 1) { // Redirigir al usuario con un mensaje de bienvenida
                return redirect()->to( '/')->with('success', '¡Bienvenido(a)!');
            }
            if ($usuario->fk_tipo_usuario == 2) {
                return redirect()->to('/')->with('success', 'Bienvenido(a)');
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect()->to('/iniciarsesion')
            ->with('error_credentials', 'Usuario o contraseña incorrectos')
            ->with('error_retry', 'Introduzca sus datos de nuevo')
            ->with('use_js_alerts', true);
        }
    }

    private function buscar($nombre, $contraseña)
    {
        $usuario = Usuario::where('user', $nombre)
            ->where('estatus', 1)
            ->first();
    
        if ($usuario && $contraseña == $usuario->password) {
            return $usuario;
        } else {
            return null;
        }
    }

    public function logout() {
        Auth::logout(); 
        session()->flush();// Cierra la sesión del usuario
        return redirect('/')->with('success', 'Sesión cerrada'); // Redirige a la página de inicio de sesión u otra página de tu elección
    }

    public function mostrarperfil(){
        $pkdelusuario = session('id');
        $dato = usuario::select('usuario.*')->where('pk_usuario', $pkdelusuario)->first();;
        return view("perfil",compact("dato"));
    }

    public function editarperfil($pk_usuario){
        $editarusuario = Usuario::find($pk_usuario);
        return view('editarusuario', compact("editarusuario"));

    }

    public function actualizarusuario(Request $request, $pk_usuario) {
        // Validar los datos del formulario
        $request->validate([
            'nuevo_usuario' => 'required|string',
            'nuevo_correo' => 'required|string'
        ]);
  
        // aqui optenemos los datos de la categoria que se va a editar llamandola por el pk
        $usuario = Usuario::find($pk_usuario);
  
        // aqui es para actualizar los datos que ese optubieron del codigo de arriba pa
        $usuario->user = $request->input('nuevo_usuario');
        $usuario->email = $request->input('nuevo_correo');
  
        $usuario->save();
  
        // Redirigir a la página de lista de instituciones o a donde desees
        return redirect(url('/vermiperfil'));
    }

}
 