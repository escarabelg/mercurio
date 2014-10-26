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
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Alterando informações do evento</h3>
            </div>
            <?php
            echo form_open("eventos/alterar/$eventosId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="eventosNome">Nome</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'eventosNome', 'class' => 'form-control'), set_value('eventosNome', $query->eventosNome)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDescricao">Descrição</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-list-alt"></span>
                        <?php echo form_input(array('name' => 'eventosDescricao', 'class' => 'form-control'), set_value('eventosDescricao', $query->eventosDescricao)); ?>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="usuariosCep">Email</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'eventosEmail', 'class' => 'form-control'), set_value('eventosEmail', $query->eventosEmail), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDataInicio">Data de Início</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        <?php echo form_input(array('name' => 'eventosDataInicio', 'class' => 'form-control'), set_value('eventosDataInicio', $query->eventosDataInicio)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosDataTermino">Data Término</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        <?php echo form_input(array('name' => 'eventosDataTermino', 'class' => 'form-control'), set_value('eventosDataTermino', $query->eventosDataTermino)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosLocal">Local</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-screenshot"></span>
                        <?php echo form_input(array('name' => 'eventosLocal', 'class' => 'form-control'), set_value('eventosLocal', $query->eventosLocal)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosCep">CEP</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'eventosCep', 'class' => 'form-control'), set_value('eventosCep', $query->eventosCep)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosEndereco">Endereço</label>
                                                <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'eventosEndereco', 'class' => 'form-control'), set_value('eventosEndereco', $query->eventosEndereco)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosBairro">Bairro</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'eventosBairro', 'class' => 'form-control'), set_value('eventosBairro', $query->eventosBairro)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosNumero">Número</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'eventosNumero', 'class' => 'form-control'), set_value('eventosNumero', $query->eventosNumero)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosEstado">Estado</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'eventosEstado', 'class' => 'form-control'), set_value('eventosEstado', $query->eventosEstado)); ?>
                    </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label" for="eventosCidade">Cidade</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'eventosCidade', 'class' => 'form-control'), set_value('eventosCidade', $query->eventosCidade));?>
                    </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="eventosValor">Valor</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"></span>
                        <?php echo form_input(array('name' => 'eventosValor', 'class' => 'form-control'), set_value('eventosValor', $query->eventosValor)); ?>
                    </div>
                     </div>
                    <div class="form-group">
                        <label class="control-label" for="eventosVisibilidade">Visivel?</label>
                                                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-eye-open"></span>
                        <select class="form-control" name="eventosVisibilidade">
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('eventosId', $query->eventosId);?>
                        <?php echo form_submit(array('name' => 'alterar', 'class' => 'btn btn-primary'), 'Alterar'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
