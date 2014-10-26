<?php 
$atividadesId = $this->uri->segment(3);
if($atividadesId == null) {
    redirect('atividades/listar');
} 
$query = $this->atividades_model->obter_atividade_por_id($atividadesId);
?>

<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Deseja realmente excuir esta atividade?</h3>
            </div>
            <?php
            echo form_open("atividades/deletar/$atividadesId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="atividadesNome">Nome</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'atividadesNome', 'class' => 'form-control'), set_value('atividadesNome', $query->atividadesNome), 'disabled'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="atividadesDescricao">Descrição</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'atividadesDescricao', 'class' => 'form-control'), set_value('atividadesDescricao', $query->atividadesDescricao), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="atividadesDataInicio">Data de Início</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'atividadesDataInicio', 'class' => 'form-control'), set_value('atividadesDataInicio', $query->atividadesDataInicio), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="atividadesDataTermino">Data Término</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'atividadesDataTermino', 'class' => 'form-control'), set_value('atividadesDataTermino', $query->atividadesDataTermino), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('atividadesId', $query->atividadesId);?>
                        <?php echo form_submit(array('name' => 'excluir', 'class' => 'btn btn-primary'), 'Excluir'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>

