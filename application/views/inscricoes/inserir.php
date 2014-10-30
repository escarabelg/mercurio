<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp; Área de inscrição</h3>
            </div>
            <?php
            echo form_open("inscricoes/inserir", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <?php if ($this->input->post('inscricoesEventosId') != null) { ?>
                    <div class="form-group">
                        <label class="control-label">Evento selecionado</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <select class="form-control" name="inscricoesEventosId">
                                <?php 
                                foreach ($eventos as $row) {
                                    if($this->input->post('inscricoesEventosId') == $row->eventosId){
                                        echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($this->input->post('inscricoesAtividadesId') == null) { ?>
                        <div class="form-group">
                        <label class="control-label">Selecione a atividade</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-link"></span>
                            <select class="form-control" name="inscricoesAtividadesId">
                                <?php 
                                foreach ($atividades as $row) {
                                    $ativi =  $this->atividades_model->atividade_possui_vagas($row->atividadesId);
                                    if($ativi->atividadesVagasOcupadas < $ativi->atividadesVagasTotal) {
                                        echo "<option value=$row->atividadesId> $row->atividadesNome </option>";
                                    }
                                }           
                    ?>
                            </select>
                        </div>
                        </div>
                                <?php } ?>
                     <div class="form-group">
                         <?php echo form_hidden('inscricoesUsuariosId', $this->session->userdata('usuario-id')); ?>
                   <?php echo form_submit(array('name' => 'cadastrar', 'class' => 'btn btn-primary'), 'Inscrever-se'); ?>
                     </div>
                    <?php } else { ?>
                    <div class="form-group">
                        <label class="control-label">Selecione o evento</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <select class="form-control" name="inscricoesEventosId">
                                <?php 
                                foreach ($eventos as $row) {
                                    echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                }                       
                                
                       ?>
                            </select>
                            <span class="input-group-btn">
                                    <?php echo form_submit(array('name' => 'pesquisar', 'class' => 'btn btn-default'), 'Pesquisar');  ?>
                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                    <?php } ?>
                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
