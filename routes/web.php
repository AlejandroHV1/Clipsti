<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoJuegoController;
use App\Http\Controllers\ClipController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//////los propios empiezan aqui////////////

//categoria 
                        // recuerda que cuando es solo mostrar algo con una ruta de get peudes 
                        // usarla para el boton y para mandar las variables que se mostraran
Route::post('/formulariocategoria', [CategoriaController::class, 'insertarcategoria'])->name('categoria.insertarcategoria');
Route::get('/formulariocategoria', function () {
    return view('formulariocategoria');
});



//explorar
Route::get('/explorar', [CategoriaController::class, 'mostrarcategorias'])->name('explorar.vercategorias');




//tipo juego
Route::post('/formulariotipojuego', [TipoJuegoController::class, 'insertartipojuego'])->name('tipo_juego.insertartipojuego');
Route::get('/formulariotipojuego', function () {
    return view('formulariotipojuego');
});

Route::get('/listajuegoporcategoria/{categoria_id}', [TipoJuegoController::class, 'juegoporcategoria'])->name('tipo_juego.listajuegoporcategoria');

    



//clips
Route::post('/formularioclips', [ClipController::class, 'insertarclip'])->name('clip.insertarclip');
Route::get('/formularioclips', function () {
    return view('formularioclip');
});

Route::get('/clipusuario', function () {
    return view('clipsusuario');
});
Route::get('/clipusuario', [ClipController::class, 'clipporusuario'])->name('clip.mostrarclip');
Route::match(['get', 'post'], '/borrarclip/{pkclip}', [ClipController::class, 'eliminarclip'])->name('clip.borrarclip');
Route::match(['get', 'post'], '/esconderclip/{pkclip}', [ClipController::class, 'ocultarclip'])->name('clip.esconderclip');

Route::get('/clipsocultos', function () {
    return view('clipsocultos');
});
Route::get('/clipsocultos', [ClipController::class, 'verclipsocultos'])->name('clip.clipsocultos');
Route::match(['get', 'post'], '/borrarclip2/{pkclip}', [ClipController::class, 'eliminarclip2'])->name('clip.borrarclip2');
Route::match(['get', 'post'], '/desbloquearclip/{pkclip}', [ClipController::class, 'desocultarclip'])->name('clip.desbloquearclip');

Route::get('/listaclipsporjuego/{tipo_juego_id}', [ClipController::class, 'clipporjuego'])->name('clip.listaclipsporjuego');




//usuario
Route::get('/vermiperfil', function () {
    return view('perfil');
});
Route::get('/vermiperfil', [UsuarioController::class, 'mostrarperfil'])->name('usuario.mostrarPerfil');

Route::match(['get', 'post'], '/registrar', [UsuarioController::class, 'registrar'])->name('usuario.registrar');

Route::match(['get', 'post'], '/login', [UsuarioController::class, 'login'])->name('usuario.login');
Route::get('/iniciarsesion', function () {
    return view('login');
});

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');




//nabvar
Route::get('/navbar', function () {
    return view('navbar');
});
