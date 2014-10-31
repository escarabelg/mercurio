<?php
$usuariosId = $this->uri->segment(3);
if ($usuariosId == null) {
    redirect("usuarios/listar");
}

$query = $this->usuarios_model->obter_usuario_por_id($usuariosId)->row();
?>
<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;Edição de informações pessoais</h3>
            </div>
            <?php
            echo form_open("usuarios/alterar/$usuariosId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="usuariosNome">Nome Completo</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'usuariosNome', 'class' => 'form-control'), set_value('usuariosNome', $query->usuariosNome)); ?>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="usuariosEmail">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                        <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control'), set_value('usuariosEmail', $this->usuarios_model->obter_usuario_por_id($usuariosId)->row()->usuariosEmail), 'disabled'); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosCpf">CPF</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'usuariosCpf', 'class' => 'form-control'), set_value('usuariosCpf', $query->usuariosCpf)); ?>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="usuariosCep">CEP</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-screenshot"></span>
                        <?php echo form_input(array('name' => 'usuariosCep', 'class' => 'form-control'), set_value('usuariosCep', $query->usuariosCep)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosDataDeNascimento">Data de Nascimento</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                        <?php echo form_input(array('name' => 'usuariosDataDeNascimento', 'class' => 'form-control'), set_value('usuariosDataDeNascimento', $query->usuariosDataDeNascimento)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosTitulacoes">Titulações</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-bookmark"></span>
                        <?php echo form_input(array('name' => 'usuariosTitulacoes', 'class' => 'form-control'), set_value('usuariosTitulacoes', $query->usuariosTitulacoes)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosEndereco">Endereço</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'usuariosEndereco', 'class' => 'form-control'), set_value('usuariosEndereco', $query->usuariosEndereco)); ?>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="usuariosBairro">Bairro</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'usuariosBairro', 'class' => 'form-control'), set_value('usuariosBairro', $query->usuariosBairro)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosNumero">Número</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'usuariosNumero', 'class' => 'form-control'), set_value('usuariosNumero', $query->usuariosNumero)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosEstado">Estado</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'usuariosEstado', 'class' => 'form-control'), set_value('usuariosEstado', $query->usuariosEstado)); ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="usuariosCidade">Cidade</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"></span>
                        <?php echo form_input(array('name' => 'usuariosCidade', 'class' => 'form-control'), set_value('usuariosCidade', $query->usuariosCidade)); ?>
                    </div>
                    </div>

                    <?php echo form_hidden('usuariosId', $query->usuariosId); ?>
                    <div class="form-group">
                        <?php echo form_submit(array('name' => 'alterar', 'class' => 'btn btn-primary'), 'Alterar'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
