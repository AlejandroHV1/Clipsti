<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>login</title>
    <style>
    .main {    
  margin: auto;
  position: relative;
  display: flex;
  flex-direction: column;
  background-color: #240046;
  max-height: 530px;
  max-width: 400px;
  overflow: hidden;
  border-radius: 12px;
  box-shadow: 7px 7px 10px 3px #24004628;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 14px;
  padding: 24px;
}

/*checkbox to switch from sign up to login*/
#chk {
  display: none;
}

/*Login*/
.login {
  position: relative;
  width: 100%;
  height: 100%;
}

.login label {
  margin: 25% 0 5%;
}

label {
  color: #fff;
  font-size: 2rem;
  justify-content: center;
  display: flex;
  font-weight: bold;
  cursor: pointer;
  transition: .5s ease-in-out;
}

.input {
  margin: auto;
  width: 100%;
  height: 60px;
  background: #e0dede;
  padding: 5x;
  border: none;
  outline: none;
  border-radius: 4px;
}

/*Register*/
.register {
  background: #eee;
  border-radius: 30% / 5%;
  transform: translateY(5%);
  transition: .8s ease-in-out;
}

.register label {
  color: #573b8a;
  transform: scale(.6);
}

#chk:checked ~ .register {
  transform: translateY(-60%);
}

#chk:checked ~ .register label {
  transform: scale(1);
  margin: 10% 0 5%;
}

#chk:checked ~ .login label {
  transform: scale(.6);
  margin: 5% 0 5%;
}   
/*Button*/
.form button {
  width: 85%;
  height: 40px;
  margin: 12px auto 10%;
  color: #fff;
  background: #573b8a;
  font-size: 1rem;
  font-weight: bold;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: .2s ease-in;
}

.form button:hover {
  background-color: #6d44b8;
}
    </style>
</head>
<body>
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="login">
				<form action="{{ route('usuario.login') }}" method="post" class="form">
                @csrf
					<label for="chk" aria-hidden="true">Log in</label>
					<input class="input" type="text" name="nombreUsuario" placeholder="Usuario" required="">
					<input class="input" type="password" name="contrasena" placeholder="Password" required="">
					<button type="submit">Log in</button>
				</form>
			</div>

      <div class="register">
				<form action="{{ route('usuario.registrar') }}" method="post" class="form">
                @csrf
					<label for="chk" aria-hidden="true">Register</label>
					<input class="input" type="text" name="usuario" placeholder="Username" required="">
					<input class="input" type="email" name="correo" placeholder="Email" required="">
					<input class="input" type="password" name="contrasena" placeholder="Password" required="">
					<button type="submit">Register</button>
				</form>
			</div>
	</div>
</body>
</html>


<!-- <form action="{{ route('usuario.login') }}" method="post">
        @csrf
        <input type="text" name="nombreUsuario" placeholder="Ingrese su correo">
        <input type="password" name="contrasena" placeholder="Ingrese su contraseña">
        <button type="submit">Enviar</button>
    </form>
    <button><a href="{{url('/registrarusuario')}}">Registrarse</a></button>

    <form action="{{ route('usuario.registrar') }}" method="post">
        @csrf
        <input type="text" name="usuario" placeholder="nombre de ususario">
        <input type="text" name="correo" placeholder="correo">
        <input type="text" name="contrasena" placeholder="contraseña">
        <button type="submit">Registrarte</button>
    </form> -->