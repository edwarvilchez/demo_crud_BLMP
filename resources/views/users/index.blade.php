<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD Laravel MySQL</title>

    <!---Bootstrap 4.5 CSS--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx=auto">
                <!--agregamos el formulario para poder guardar en la BD-->
                <div class="card border-0 shadow">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store')}}" method="POST">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" name="email" class="form-control" placeholder="Correo"  value="{{ old('email')}}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--agregamos el formulario para poder guardar en la BD-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>

                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user)}}" method="POST">
                                    @method('DELETE')<!--helper-->
                                    @csrf<!--token de seguridad--->
                                    <input 
                                    type="submit" 
                                    value="Eliminar" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Realmente desea borrar el Registro?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
