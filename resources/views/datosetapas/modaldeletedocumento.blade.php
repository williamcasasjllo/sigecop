<div class="modal" id="modaldeleteDocumento" tabindex="-1" role="dialog" aria-labelledby="modaldeleteDocumentoTitulo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modaldeleteDocumentoTitulo">Confirmar eliminación</h4>
            </div>
            <div class="modal-body">
                <p>
                    Confirma que desea eliminar el documento <b><div id="Nombre"><span id="modaldeleteDocumentoNombre"></span></div></b>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <span class="pull-right">
                    <form id="modaldeleteDocumentoForm"  method="post">
                        <input name="_token" type="hidden"  value="{{ csrf_token() }}">
                        <button id="eliminar" type="submit" class="btn btn-danger" >Eliminar</button>
                    </form>
                </span>
            </div>
        </div>
    </div>
</div>
