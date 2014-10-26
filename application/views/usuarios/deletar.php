<?php
$usuariosId = $this->uri->segment(3);
if($usuariosId == null) {
    redirect("usuarios/listar");
}
$query = $this->usuarios_model->obter_usuario_por_id($usuariosId)->row();
?>
<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Deseja realmente excuir este registro?</h3>
            </div>
            <?php
            echo form_open("usuarios/deletar/$usuariosId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="usuariosNome">Nome Completo</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'usuariosNome', 'class' => 'form-control'), set_value('usuariosNome', $query->usuariosNome),'disabled=disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosCpf">CPF</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'usuariosCpf', 'class' => 'form-control'), set_value('usuariosCpf', $query->usuariosCpf),'disabled=disabled'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="usuariosEmail">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control'), set_value('usuariosEmail', $this->usuarios_model->obter_usuario_por_id($usuariosId)->row()->usuariosEmail), 'disabled'); ?>
                    </div>
                    </div>
                    <?php echo form_hidden('usuariosId', $query->usuariosId); ?>
                    <div class="form-group">
                        <?php echo form_submit(array('name' => 'excluir', 'class' => 'btn btn-primary'),"Excluir"); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
