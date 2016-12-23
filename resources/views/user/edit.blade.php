<div class="container">
    <h1>Crear usuario</h1>
    <h4><a href="{{route('users.index')}}">Ver Usuarios</a></h4>
    <hr>
    <form method="post" action="/users/{{$user->id}}">
        <input name="_method" type="hidden" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="InputName">Nombres</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombres" value="{{ $user->nombre }}">
        </div>
        <div class="form-group">
            <label for="InputApellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="{{ $user->apellidos }}">
        </div>
        <div class="form-group">
            <label for="InputEmail">Dirección Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
</div>