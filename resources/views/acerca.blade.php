@extends('master')
@section('homecontent')
    <div class="container col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading text-center"><label style="font-size : 25px;">SIGECOP</label></div>
            <div class="panel-body">
                <!-- Container (Services Section) -->
                <div class="container-fluid text-center">
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-search"></span>
                            <h4>Consulta Procesos de Contratación</h4>
                            <p>Visualiza la información detallada de un proceso contractual.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-wrench"></span>
                            <h4 style="color:#303030;">Procesos Contractuales</h4>
                            <p>Crea, suspende, reanuda y diligencia información de un proceso de contratación.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-lock"></span>
                            <h4>Gestión de Tipos de Proceso de Contratación</h4>
                            <p>Crea, suspende y edita las diferentes modalidades de contratación.</p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid text-center">
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-stats"></span>
                            <h4>Indicadores</h4>
                            <p>Visualiza la cantidad de contratos y el tiempo que tardan en ser tramitados.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-user"></span>
                            <h4>Gestión de Usuarios</h4>
                            <p>Agrega y asigna roles a los usuarios para que tengan acceso a SIGECOP.</p>
                        </div>
                        <div class="col-sm-4">
                            <span class="glyphicon glyphicon-th-list"></span>
                            <h4>Registro de Actividad</h4>
                            <p>Visualiza los cambios realizados entre etapas y datos de un proceso de contratación.</p>
                        </div>
                    </div>
                </div><br><br>
                <!-- Container (About) -->
                <div class="container-fluid text-center">
                    <h4>Desarrollado por</h4>
                    <p>William Casas Jaramillo</p>
                    <p>Juan Carlos Osorio Vásquez</p><br>
                    <h4>Asesorado por</h4>
                    <p>M. Sc. Roberto Antonio Manjarrés Betancur</p><br>
                    <h4>Del Programa Académico</h4>
                    <p>Ingeniería Informática - Facultad de Ingenierías</p>
                    <p>Politécnico Colombiano Jaime Isaza Cadavid &copy; 2017 – Todos los derechos reservados</p>
                    <p chrome ><strong><br>Para mejorar tu experiencia en SIGECOP cambia tu navegador a <a href="https://www.google.com/chrome/">Google Chrome</a>.</strong></p>
                    <script>
                        if (window.chrome) {
                            $('p[chrome]').hide();
                        }else {
                            $('p[chrome]').show();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection