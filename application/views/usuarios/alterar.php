<?php
$usuariosId = $this->uri->segment(3);
if($usuariosId == null) {
    redirect("usuarios/listar");
}
echo "<h1>&nsc; Alteração de Usuários</h1>";
$query = $this->usuarios_model->obter_usuario_por_id($usuariosId)->row();

echo form_open("usuarios/alterar/$usuariosId");
echo validation_errors("<p class='mensagem-erro'>",'</p>');
echo form_label('Nome Completo');
echo form_input(array('name' => 'usuariosNome'), set_value('usuariosNome', $query->usuariosNome));

echo form_label('CPF');
echo form_input(array('name' => 'usuariosCpf'), set_value('usuariosCpf',$query->usuariosCpf));

echo form_label('CEP');
echo form_input(array('name' => 'usuariosCep'), set_value('usuariosCep',$query->usuariosCep));

echo form_label('Data de Nascimento');
echo form_input(array('name' => 'usuariosDataDeNascimento'), set_value('usuariosDataDeNascimento',$query->usuariosDataDeNascimento));

echo form_label('Titulações');
echo form_input(array('name' => 'usuariosTitulacoes'), set_value('usuariosTitulacoes',$query->usuariosTitulacoes));

echo form_label('Endereço');
echo form_input(array('name' => 'usuariosEndereco'), set_value('usuariosEndereco',$query->usuariosEndereco));

echo form_label('Bairro');
echo form_input(array('name' => 'usuariosBairro'), set_value('usuariosBairro',$query->usuariosBairro));

echo form_label('Número');
echo form_input(array('name' => 'usuariosNumero'), set_value('usuariosNumero',$query->usuariosNumero));

echo form_label('Estado');
echo form_input(array('name' => 'usuariosEstado'), set_value('usuariosEstado',$query->usuariosEstado));

echo form_label('Cidade');
echo form_input(array('name' => 'usuariosCidade'), set_value('usuariosCidade',$query->usuariosCidade));

echo form_label('Email');
echo form_input(array('name' => 'usuariosEmail'), set_value('usuariosEmail',$this->usuarios_model->obter_usuario_por_id($usuariosId)->row()->usuariosEmail), 'disabled');

echo form_hidden('usuariosId', $query->usuariosId);
echo form_submit(array('name' => 'alterar'), 'Alterar');
echo form_close();