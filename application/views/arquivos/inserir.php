
<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp; Submissão de artigos</h3>
            </div>
            <?php
            echo form_open("arquivos/inserir", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                            <label class="control-label">Selecione o Evento</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="arquivosEventosId">
                                    <?php
                                    foreach ($eventos as $row) {
                                     echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="control-label">Selecione o Orientador</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="arquivosOrientadorId">
                                    <?php
                                    foreach ($usuarios as $row) {
                                     echo "<option value=$row->usuariosId> $row->usuariosNome </option>";
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="control-label" for="arquivosTitulo">Título</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'arquivosTitulo', 'class' => 'form-control'), set_value('arquivosTitulo')); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="arquivosFile">Upload do artigo</label>
                        <?php echo form_upload(array('name' => 'arquivosFile', 'class' => 'form-upload'), set_value('arquivosFile')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('arquivosCriadorId', $this->session->userdata('usuario-id')); ?>
                        <?php echo form_submit(array('name' => 'submeter', 'class' => 'btn btn-primary'), 'Submeter'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
