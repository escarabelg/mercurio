<?php 
if ($this->session->flashdata('avaliar-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('avaliar-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}
?>

<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
        <div class="panel panel-default panel-body">
            
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp; Área de avaliação dos artigos</h3>
            </div>
            <?php
            echo form_open("arquivos/avaliar", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <?php if ($this->input->post('arquivosEventosId') != null) { ?>
                    <div class="form-group">
                        <label class="control-label">Evento selecionado</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <select class="form-control" name="arquivosEventosId">
                                <?php 
                                foreach ($eventos as $row) {
                                    if($this->input->post('arquivosEventosId') == $row->eventosId){
                                        echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                    }
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label">Selecione o Artigo</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="arquivosId">
                                    <?php
                                    foreach ($arquivos as $row) {
                                     echo "<option value=$row->arquivosId> $row->arquivosTitulo </option>";
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="arquivosStatus">Selecione o status do artigo</label>
                         <div class="input-group">
                         <span class="input-group-addon glyphicon glyphicon-eye-open"></span>
                        <select class="form-control" name="arquivosStatus">
                            <option value="A">Aprovado</option>
                            <option value="P">Pendente</option>
                            <option value="R">Reprovado</option>
                        </select>
                    </div>
                    </div>
                  
                     <div class="form-group">
                        <label class="control-label" for="arquivosDescricao">Descrição da análise</label>
                          <div class="input-group">
                         <span class="input-group-addon glyphicon glyphicon-pencil"></span>
                        <?php echo form_textarea(array('name' => 'arquivosDescricao', 'class' => 'form-control'), set_value('atividadesDescricao')); ?>
                    </div>
                     </div>
                    
                    <div class="form-group">
                        <?php echo form_submit(array('name' => 'avaliar', 'class' => 'btn btn-primary'), 'Avaliar'); ?>
                    </div>
      
   
                    <?php }else{ ?>    
                    
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
