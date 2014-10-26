<?php 
$eventosId = $this->uri->segment(3);
if($eventosId == null) {
    redirect('eventos/listar');
} 
$query = $this->eventos_model->obter_evento_por_id($eventosId);
?>

<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Deseja realmente excuir este evento?</h3>
            </div>
            <?php
            echo form_open("eventos/deletar/$eventosId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="eventosNome">Nome</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'eventosNome', 'class' => 'form-control'), set_value('eventosNome', $query->eventosNome), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosCep">Email</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'eventosEmail', 'class' => 'form-control'), set_value('eventosEmail', $query->eventosEmail), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDescricao">Descrição</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'eventosDescricao', 'class' => 'form-control'), set_value('eventosDescricao', $query->eventosDescricao), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDataInicio">Data de Início</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'eventosDataInicio', 'class' => 'form-control'), set_value('eventosDataInicio', $query->eventosDataInicio), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDataTermino">Data Término</label>
                                                                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'eventosDataTermino', 'class' => 'form-control'), set_value('eventosDataTermino', $query->eventosDataTermino), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('eventosId', $query->eventosId);?>
                        <?php echo form_submit(array('name' => 'excluir', 'class' => 'btn btn-primary'), 'Excluir'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
