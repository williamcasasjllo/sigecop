@php
    $existen_datos=false;
@endphp
<div class="table-responsive">
    @if($etapa_activa=='Activo')
        <table class="table table-borderless table-tam">
    @else
        <table class="table table-condensed table-headborderless">
    @endif
        @if($etapa_activa!='Activo')
        @else
            <h5 class="text"><label>Campos obligatorios (*)</label></h5>
        @endif
        <thead style="font-size : 13px;">
        <tr>
            @if($etapa_activa!='Activo')
                <th class="text-justify text-info" width="35%">Requisito</th>
                <th class="text-justify text-info" width="50%">Valor</th>
            @else
                <th class="text-justify text-info" width="35%"></th>
                <th class="text-justify text-info" width="50%"></th>
            @endif
        </tr>
        </thead>
        <tbody style="font-size : 11px;">
        <form id="FormEtapa{{$etapa->id}}" class="form-horizontal" method="post" action="/datosetapas">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="proceso_contractual_id" value="{{$proceso_contractual->id}}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @foreach ($requisitos as $requisito)
                @if ($requisito->etapas_id==$etapa->id)
                    @php
                        $existen_datos=true;
                        $tipo_req=\App\Http\Controllers\DatosEtapaController::imprimir_tipo_requisitos($requisito->tipo_requisitos_id);
                        $valor=\App\Http\Controllers\DatosEtapaController::busqueda_valor_dato_etapa($proceso_contractual->id, $requisito->id);
                        $required="";
                        $obligatorio="";
                        if ($requisito->obligatorio=='1'){
                            $required="required";
                            $obligatorio="(*)";
                        }
                        if($etapa_activa=='Activo'){
                            $requisito_activado='';
                            $checkbox_activado='';
                            $btn_activado='';
                        }else{
                            $requisito_activado='readonly';
                            $checkbox_activado='disabled';
                            $btn_activado='disabled';
                        }
                    @endphp
                    @if( $tipo_req == 'checkbox')
                        @if($etapa_activa=='Activo')
                            @php
                                if ($valor==1){
                                    $disabled='disabled';
                                }else{
                                    $disabled='';
                                }
                            @endphp
                            <input id="unchecked{{$requisito->id}}" type="hidden" name="atributo[]" value="0" {{$disabled}} >
                            <tr><div class="form-group">
                                <td class="text-right">
                                    <h5><label class="control-label" for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5>
                                </td>
                                    <div class="checkbox">
                                        <td><label><input {{$checkbox_activado}} id="checked{{$requisito->id}}" type="checkbox" {{ $valor==1 ? 'checked':''}} value="1" name="atributo[]" {{$required}} onblur="enviar()" ></label></td>
                                        <script>
                                            document.getElementById('checked{{$requisito->id}}').onchange = function() {
                                                document.getElementById('unchecked{{$requisito->id}}').disabled = this.checked;
                                            };
                                        </script>
                                    </div>
                            </div></tr>
                            <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                        @else
                            <tr>
                                <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                @if ($valor==1)
                                    <td width="35%">Si</td>
                                @else
                                    <td width="35%">No</td>
                                @endif
                            </tr>
                        @endif
                    @elseif ( $tipo_req == 'textarea' )
                            @if($etapa_activa=='Activo')
                            <tr><div class="form-group">
                                    <td class="text-right">
                                        <h5><label class="control-label " for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5></td>
                                        <td><textarea {{$requisito_activado}} rows="5" name="atributo[]" class="form-control" autocomplete="off" {{$required}} onchange="enviar()">{{$valor}}</textarea></td>
                                </div>
                            </tr>
                                <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                            @else
                                <tr>
                                    <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                    <td class="text-justify" width="35%">{{$valor}}</td>
                                </tr>
                            @endif
                    @elseif ( $tipo_req == 'date' )
                        @if($etapa_activa=='Activo')
                            <tr><div class="form-group">
                                    <td class="text-right">
                                        <h5><label class="control-label " for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5></td>
                                    <td><input {{$requisito_activado}} type="date" name="atributo[]" class="form-control" value="{{$valor}}" autocomplete="off" {{$required}} onchange="enviar()"></td>
                                </div>
                            </tr>
                            <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                        @else
                            <tr>
                                <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                <td class="text-justify" width="35%">{{$valor}}</td>
                            </tr>
                        @endif
                    @elseif ( $tipo_req == 'enlace' )
                        @if($etapa_activa=='Activo')
                            <tr><div class="form-group">
                                    <td class="text-right">
                                        <h5><label class="control-label " for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5></td>
                                    <td><input {{$requisito_activado}} type="text" name="atributo[]" class="form-control" value="{{$valor}}" autocomplete="off" {{$required}} onchange="enviar()"></td>
                                </div>
                            </tr>
                            <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                        @else
                            <tr>
                                <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                <td class="text-justify" width="35%"><a href="{{$valor}}" target="_blank">{{$valor}}</a></td>
                            </tr>
                        @endif
                    @elseif ($tipo_req == 'file')
                            @if($etapa_activa=='Activo')
                                <tr><div class="form-group">
                                        <td class="text-right">
                                            <h5><label class="control-label " for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5>
                                        </td>
                                        @php
                                            $tipo=\App\Http\Controllers\DatosEtapaController::busqueda_tipo_dato_etapa($proceso_contractual->id, $requisito->id);
                                            if ($valor==""){
                                                $disabled='disabled';
                                            }else{
                                                $disabled='';
                                            }
                                        @endphp
                                        <td width="35%" id="documento{{$requisito->id}}{{$proceso_contractual->id}}"><h5><a href="/uploads/{{$valor}}-{{$requisito->id}}-{{$proceso_contractual->id}}.{{$tipo}}" download="{{$valor}}">{{$valor}}</a></h5></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modaladdDocumento" data-idetapa="{{$etapa->id}}" data-mostrar="#documento{{$requisito->id}}{{$proceso_contractual->id}}"
                                                    data-idrequisito="{{$requisito->id}}"  data-idprocesocontractual="{{$proceso_contractual->id}}"  data-boton="#boton{{$requisito->id}}{{$proceso_contractual->id}}" >Subir Documento</button>
                                            <button  type="button" class="btn btn-danger btn-xs" id="boton{{$requisito->id}}{{$proceso_contractual->id}}" data-toggle="modal" data-target="#modaldeleteDocumento"
                                                     data-nombre="<h5><a href='/uploads/{{$valor}}-{{$requisito->id}}-{{$proceso_contractual->id}}.{{$tipo}}' download='{{$valor}}'>{{$valor}}</a></h5>"
                                                     data-mostrar="#documento{{$requisito->id}}{{$proceso_contractual->id}}" data-id="{{$etapa->id}}"  data-url="{{ route('datosetapas.eliminarDocumento', array( $proceso_contractual->id, $requisito->id)) }}"
                                                     data-boton="#boton{{$requisito->id}}{{$proceso_contractual->id}}" {{$disabled}} >Eliminar</button>
                                        </td>
                                    </div></tr>
                                    <input type="hidden" name="atributo[]"  class="form-control"  autocomplete="off">
                                <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                            @else
                                <tr>
                                    @php
                                    $tipo=\App\Http\Controllers\DatosEtapaController::busqueda_tipo_dato_etapa($proceso_contractual->id, $requisito->id);
                                    @endphp
                                    <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                    <td width="35%"><a href="/uploads/{{$valor}}-{{$requisito->id}}-{{$proceso_contractual->id}}.{{$tipo}}" download="{{$valor}}">{{$valor}}</a></td>
                                </tr>
                            @endif
                        @else
                            @if($etapa_activa=='Activo')
                            <tr><div class="form-group">
                                    <td class="text-right">
                                        <h5><label class="control-label " for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label></h5></td>
                                        <td><input {{$requisito_activado}} type="{{$tipo_req}}" name="atributo[]" class="form-control" value="{{$valor}}" autocomplete="off" {{$required}} onchange="enviar()"></td>
                                </div></tr>
                                <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                            @else
                                <tr>
                                    <td class="text-justify" width="35%"><label>{{$requisito->nombre}}</label></td>
                                    <td width="35%">{{$valor}}</td>
                                </tr>
                            @endif
                    @endif
                @endif
            @endforeach
            @if ($existen_datos==true)
                <form class="form-inline">
                    <div align="center">
                        @if ($etapa_activa=='Activo')
                            <tr>
                                <td class="text-right" ><button id="btnGuardar{{$etapa->id}}" {{$btn_activado}} type="submit" class="btn btn-primary" formnovalidate>Guardar</button></td>
                                    @if($etapa->indice < count($etapas))
                                    <td><button type="button" {{$btn_activado}} class="btn btn-success" data-toggle="modal" data-target="#modalSave" data-url="{{ route('datosetapas.enviaretapa', array($proceso_contractual->id, $etapa->id)) }}"
                                            data-nombre="{{$etapa->nombre}}">Enviar a siguiente etapa</button></td>
                                @else
                                    <td><button type="button" {{$btn_activado}} class="btn btn-danger" data-toggle="modal" data-target="#modalFinal" data-url="{{ route('procesocontractual.finalizar',array($proceso_contractual->id, $etapa->id)) }}"
                                                data-nombre="{{$etapa->nombre}}">Finalizar</button></td>
                                @endif
                            </tr>
                        @endif
                    </div>
                </form>
            @else
                <h4>No hay información por diligenciar.</h4>
            @endif
        </form>
        </tbody>
        @if($etapa_activa=='Activo')
                <script>
                    function enviar(){
                        $('#FormEtapa{{$etapa->id}}').trigger("submit");
                    }
                    $(document).ready( function() {
                        // Interceptamos el evento submit del formulario guardar datos
                         $('#FormEtapa{{$etapa->id}}').submit(function () {
                             $('#btnGuardar{{$etapa->id}}').attr("disabled", true);
                             $('#btnGuardar{{$etapa->id}}').html('Guardando...');
                            // Enviamos el formulario usando AJAX
                           $.ajax({
                                    type: 'POST',
                                    url: $(this).attr('action'),
                                    data: $(this).serialize(),
                                // Mostramos un mensaje con la respuesta de PHP
                                success: function (data) {
                                    $('#btnGuardar{{$etapa->id}}').attr("disabled", false);
                                    $('#btnGuardar{{$etapa->id}}').html('Guardar');
                                }
                            });
                            return false;
                        });
                    });
                </script>
            </table>
        @else
            </table>
        @endif
</div>

