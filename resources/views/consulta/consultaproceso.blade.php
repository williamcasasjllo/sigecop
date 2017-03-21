@extends('master')
@section('consultacontent')
    <div class="container col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading text-center"><h1>Consulta de proceso de contratación</h1></div>
            <div class="panel-body">

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse"  data-parent="#accordion" href="#collapseconsulta">
                                <h4><label class="text-info">Filtrar búsqueda
                                    <span class="glyphicon glyphicon-search"></span>
                                </label></h4>
                            </a>
                        </div>
                        <div id="collapseconsulta" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="well" name="FiltrosDeBusqueda">
                    <form class="form-horizontal" method="get" role="buscar" action="{{url('consultaproceso')}}">
                        <div class="form-group">
                            <h6><label class="control-label col-md-2" for="NumCDP">Número de CDP: </label></h6>
                            <div class="col-md-3">
                                <input type="text" name="NumCDP" class="form-control" placeholder="Número de CDP">
                            </div>
                            <h6><label class="control-label col-md-3" for="NumContrato">Número de Contrato: </label></h6>
                            <div class="col-md-3">
                                <input type="text" name="NumContrato" class="form-control" autocomplete="off" placeholder="Número de contrato">
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><label class="control-label col-md-2" for="TipoProceso">Tipo de Proceso de Contratación: </label></h6>
                            <div class="col-md-4">
                                <select class="form-control" name="TipoProceso" id="TipoProceso">
                                    <option value="">Seleccione una opción</option>
                                    @foreach($tipos_procesos as $tipo_proceso)
                                        <option value="{{$tipo_proceso->nombre}}">{{$tipo_proceso->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h6><label class="control-label col-md-2" for="Dependencia">Depedencia: </label></h6>
                            <div class="col-md-4">
                                <select class="form-control" name="dependencia" id="Dependencia">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Rectoría">Rectoría</option>
                                    <option value="Vicerrectoría de Docencia e Investigación">Vicerrectoría de Docencia e Investigación</option>
                                    <option value="Vicerrectoría de Extensión">Vicerrectoría de Extensión</option>
                                    <option value="Vicerrectoría Administrativa">Vicerrectoría Administrativa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><label class="control-label col-md-2" for="Objeto">Objeto: </label></h6>
                            <div class="col-md-4">
                                <textarea rows="5" name="Objeto" class="form-control" autocomplete="off" placeholder="Objeto del contrato"></textarea>
                            </div>
                        </div>

                        <form class="form-inline">
                            <div align="center">
                                <br><button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </form>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div name="ResultadosDeBusqueda">
                    <div class=" well table-responsive">
                        @if($procesos_contractuales->count())
                            <table class="table table-hover">
                                <thead style="font-size : 11px;">
                                <tr>
                                    <th class="text-center">CDP</th>
                                    <th class="text-center">Año</th>
                                    <th class="text-center" width="35%">Objeto</th>
                                    <th class="text-center">Número de contrato</th>
                                    <th class="text-center">Dependencia</th>
                                    <th class="text-center">Tipo de Proceso</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody style="font-size : 11px;">
                                @foreach($procesos_contractuales as $proceso_contractual)
                                    <tr>
                                        <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->numero_cdp }}</td>
                                        <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->year_cdp }}</td>
                                        <td style="font-size : 11px;" class="text-justify" width="35%">{{ $proceso_contractual->objeto }}</td>
                                        @if(($proceso_contractual->numero_contrato=='0')||($proceso_contractual->numero_contrato==''))
                                            <td style="font-size : 11px;" class="text-center">Sin asignar.</td>
                                        @else
                                            <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->numero_contrato }}</td>
                                        @endif
                                        <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->dependencia }}</td>
                                        <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->tipo_proceso }}</td>
                                        <td style="font-size : 11px;" class="text-center">{{ $proceso_contractual->estado }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('consulta.consultavermas', $proceso_contractual->id) }}" class="btn btn-info btn-xs">Ver más</a><br>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        @else
                            <h4 class="well" align="center">No existen procesos por consultar.</h4>
                        @endif
                        {{$procesos_contractuales->appends(Request::all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection