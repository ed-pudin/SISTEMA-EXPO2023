<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }
        div{
            margin-top:15px;
        }
	</style>
</head>
<body>
	<h2>Saludos, {{$name}}.</h2>
	<p>El siguiente correo se proporcionan las credenciales para el acceso a <a href="lmad2023.com">Expo 2023</a>.</p>
    <p>Con el usuario <b>{{$key}}</b> y contraseña <b>{{$password}}</b>.</p>
    <div>
        <h3>Que tenga buen día.</h3>
        <p>En caso de alguna duda comuniquese con el Departamento de Multimedia de la Facultad de Ciencias Físico Matemáticas.</p>
        <h6>Favor de no responder este correo.</h6>
    </div>
</body>
</html>
