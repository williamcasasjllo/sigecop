<div class="modal fade" id="modaladdDocumento" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subir documento<span id="modalRequisitoNombre"></span></h4>
                <span id="modalRequisitoId"></span>
            </div>
            <div class="modal-body">
                <!-- Formulario Subir Documento-->
                {!! Form::open(['url'=> 'datosetapas/documento',
                                  'method'=> 'post',
                                  'files'=>'true',
                                  'id' => 'my-dropzone' ,
                                  'class' => 'dropzone']) !!}
                <div class="dz-message needsclick" style="height:200px;">
                    Arrastre y suelte el documento ó presione click aquí.
                    <input type="hidden" id="modaladdDocumentoIdproceso" name="proceso_contractual_id" />
                    <input type="hidden" id="modaladdDocumentoIdrequisito" name="requisito_id" />
                    <input type="hidden" id="modaladdDocumentoIdetapa" name="etapa_id" />

                </div>
                <div class="dropzone-previews"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>