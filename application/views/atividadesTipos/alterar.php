<?php 
$atividadesTiposId = $this->uri->segment(3);
if($atividadesTiposId == null) {
    redirect('atividadesTipos/listar');
} 
$query = $this->atividadesTipos_model->obter_atividadesTipos_por_id($atividadesTiposId);
?>
<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Alterando informações do tipo de atividade</h3>
            </div>
            <?php
            echo form_open("atividadesTipos/alterar/$atividadesTiposId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="atividadesTiposNome">Nome</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'atividadesTiposNome', 'class' => 'form-control'), set_value('atividadesTiposNome', $query->atividadesTiposNome), 'autofocus'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('atividadesTiposId', $query->atividadesTiposId); ?>
                        <?php echo form_submit(array('name' => 'alterar', 'class' => 'btn btn-primary'), 'Alterar'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
