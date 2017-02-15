@php
    $existen_datos=false;
@endphp
<h4>Diligencie los siguientes datos: </h4><br>
Campos obligatorios (*)<br><br>
<form class="form-horizontal" method="post" action="/datosetapas">
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
                    //cuando se vaya a pasar de etapa, se activa el required
                    $required="";
                    $obligatorio="(*)";
                }
                if($etapa_activa=='Activo'){
                    $requisito_activado='';
                    $btn_activado='';
                }else{
                    $requisito_activado='readonly';
                    $btn_activado='disabled';
                }
            @endphp
            @if( $tipo_req == 'checkbox')
                @php
                    if ($valor==1){
                        $disabled='disabled';
                    }else{
                        $disabled='';
                    }
                @endphp
                <input id="unchecked{{$requisito->id}}" type="hidden" name="atributo[]" value="0" {{$disabled}}>
                <div class="form-group">
                    <label class="control-label col-md-5" for="Input">{{$requisito->nombre}} {{$obligatorio}}:</label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label><input {{$requisito_activado}} id="checked{{$requisito->id}}" type="checkbox" {{ $valor==1 ? 'checked':''}} value="1" name="atributo[]"></label>
                            <script>
                                document.getElementById('checked{{$requisito->id}}').onchange = function() {
                                    document.getElementById('unchecked{{$requisito->id}}').disabled = this.checked;
                                };
                            </script>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
            @elseif ( $tipo_req == 'textarea' )
                <div class="form-group">
                    <label class="control-label col-md-5" for="Input">{{$requisito->nombre}} {{$obligatorio}}: </label>
                    <div class="col-md-4">
                        <textarea {{$requisito_activado}} rows="6" name="atributo[]" class="form-control" autocomplete="off" {{$required}}>{{$valor}}</textarea>
                    </div>
                </div>
                <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
                @else
                    <div class="form-group">
                        <label class="control-label col-md-5" for="Input">{{$requisito->nombre}} {{$obligatorio}}: </label>
                        <div class="col-md-4">
                            <input {{$requisito_activado}} type="{{$tipo_req}}" name="atributo[]" class="form-control" value="{{$valor}}" autocomplete="off" {{$required}}>
                        </div>
                    </div>
                    <input type="hidden" name="requisito_id[]" value="{{$requisito->id}}">
            @endif
        @endif
    @endforeach
    @if ($existen_datos==true)
        <form class="form-inline">
            <div align="center">
                <button {{$btn_activado}} type="submit" class="btn btn-primary">Guardar</button>
                <a {{$btn_activado}} href="" class="btn btn-success"> Enviar a siguiente etapa</a><br>

            </div>
        </form>
    @else
        <h3>No hay información por diligenciar.</h3>
    @endif
</form>