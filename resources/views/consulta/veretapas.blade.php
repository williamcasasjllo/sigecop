<div>
    <div class="text-center">
        <button id="btnexpandir" type="button" class="btn btn-xs btn-block btn-success" title="Motrar contenido de todas las etapas">
            <span class="glyphicon glyphicon-chevron-down"></span> Expandir</button>
        <button id="btncontraer" type="button" class="btn btn-xs btn-block btn-success hide" title="Ocultar contenido de todas las etapas">
            <span class="glyphicon glyphicon-chevron-up"></span> Contraer</button></div><div style="margin: 7px;"></div>
    @foreach($etapas as $etapa)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse"  href="#collapse{{ $etapa->id }}">
                <h4 class="panel-title">
                    <label onmouseover="this.style.cursor='pointer';" class="text-success">{{$etapa->nombre}}</label>
                </h4>
                </a>
            </div>
            <div etapa-content id="collapse{{ $etapa->id }}" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('consulta.verdatos', compact($proceso_contractual, $etapa, $requisitos))
                </div>
            </div>
        </div>
    @endforeach
</div>
<script>
    $(document).ready(function() {
        $("#btnexpandir").click(function() {
            $('div[etapa-content]').addClass('in');
        });
        $("#btncontraer").click(function(){
            $('div[etapa-content]').removeClass('in');
        });
        $("#btnexpandir").click(function(){
            $("#btncontraer").removeClass("hide");
            $("#btnexpandir").hide();
            $("#btncontraer").show();
        });
        $("#btncontraer").click(function(){
            $("#btnexpandir").show();
            $("#btncontraer").hide();
        });
    })
</script>

