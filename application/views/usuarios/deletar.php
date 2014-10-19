<?php
$usuariosId = $this->uri->segment(3);
if($usuariosId == null) {
    redirect("usuarios/listar");
}
$query = $this->usuarios_model->obter_usuario_por_id($usuariosId)->row();
echo "<h1>&nsc; Exclusão de Usuários</h1>";

echo form_open("usuarios/deletar/$usuariosId");

echo validation_errors('<p>','</p>');

echo form_label('Nome Completo');
echo form_input(array('name' => 'usuariosNome'), set_value('usuariosNome', $query->usuariosNome), 'disabled=disabled');

echo form_label('Email');
echo form_input(array('name' => 'usuariosEmail'), set_value('usuariosEmail', $query->usuariosEmail), 'disabled=disabled');

echo form_label('CPF');
echo form_input(array('name' => 'usuariosCpf'), set_value('usuariosCpf', $query->usuariosCpf), 'disabled=disabled');

echo form_label('CEP');
echo form_input(array('name' => 'usuariosCep'), set_value('usuariosCep', $query->usuariosCep), 'disabled=disabled');

echo form_hidden('usuariosId', $query->usuariosId);

echo form_submit('excluir','Excluir');
echo form_close();