<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
        <div class="panel panel-default panel-body">
            
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp; Cadastro de atividade</h3>
            </div>
            <?php
            echo form_open("atividades/inserir", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <?php if ($this->input->post('atividadesEventosId') != null) { ?>
                    <div class="form-group">
                        <label class="control-label">Evento selecionado</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <select class="form-control" name="atividadesEventosId">
                                <?php 
                                foreach ($eventos as $row) {
                                    if($this->input->post('atividadesEventosId') == $row->eventosId){
                                        echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                    }
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label">Selecione o Palestrante</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="atividadesPalestrantesId">
                                    <?php
                                     foreach ($usuarios as $row) {       
                                        echo "<option value=$row->usuariosId> $row->usuariosNome </option>"; 
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Selecione o Tipo da Atividade</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="atividadesTipoId">
                                    <?php
                                    foreach ($atividades as $row) {       
                                        echo "<option value=$row->atividadesTiposId> $row->atividadesTiposNome </option>"; 
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label" for="atividadesNome">Nome</label>
                        <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php  echo form_input(array('name' => 'atividadesNome', 'class' => 'form-control'), set_value('atividadesNome')); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="atividadesDescricao">Descrição</label>
                        <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-list-alt"></span>
                        <?php echo form_input(array('name' => 'atividadesDescricao', 'class' => 'form-control'), set_value('atividadesDescricao')); ?>
                    </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label">Data de início</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                <select class="form-control" name="atividadesDataInicio">
                                    <?php
                                    for ($i = 0; $i <= sizeof($data) -1; $i++) {
                                        echo "<option value='$data[$i]'> $data[$i] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label">Data de término</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                <select class="form-control" name="atividadesDataTermino">
                                    <?php
                                    for ($i = 0; $i <= sizeof($data) -1; $i++) {
                                        echo "<option value='$data[$i]'> $data[$i] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label" for="atividadesLocal">Local</label>
                        <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'atividadesLocal', 'class' => 'form-control'), set_value('atividadesLocal')); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="atividadesCargaHoraria">Carga Horária</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-time"></span>
                        <?php echo form_input(array('name' => 'atividadesCargaHoraria', 'class' => 'form-control'), set_value('atividadesCargaHoraria')); ?>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="atividadesVagas">Vagas</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-send"></span>
                        <?php echo form_input(array('name' => 'atividadesVagas', 'class' => 'form-control'), set_value('atividadesVagas')); ?>
                    </div>
                    </div>
                        
                     <div class="form-group">
                        <label class="control-label" for="atividadesValor">Valor</label>
                          <div class="input-group">
                         <span class="input-group-addon glyphicon glyphicon-usd"></span>
                        <?php echo form_input(array('name' => 'atividadesValor', 'class' => 'form-control'), set_value('atividadesValor')); ?>
                    </div>
                     </div>
                    <div class="form-group">
                        <label class="control-label" for="atividadesVisibilidade">Visivel?</label>
                         <div class="input-group">
                         <span class="input-group-addon glyphicon glyphicon-eye-open"></span>
                        <select class="form-control" name="atividadesVisibilidade">
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_submit(array('name' => 'cadastrar', 'class' => 'btn btn-primary'), 'Cadastrar'); ?>
                    </div>
                    <?php }else{ ?>    
                    
                    <div class="form-group">
                            <label class="control-label">Selecione o Evento</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="atividadesEventosId">
                                    <?php
                                    foreach ($eventos as $row) {
                                     echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                     }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <?php echo form_submit(array('name' => 'gerar', 'class' => 'btn btn-default'), 'Gerar Campos'); ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                    <?php echo form_close(); ?>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
