<?php 
echo "<h1>&nsc; Cadastro de Usuários</h1>";

echo form_open('usuarios/inserir');

echo validation_errors("<p class='mensagem-erro'>","</p>");

echo form_label('Nome Completo');
echo form_input(array('name' => 'usuariosNome'), set_value('usuariosNome'), 'autofocus');

echo form_label('Email');
echo form_input(array('name' => 'usuariosEmail'), set_value('usuariosEmail'));

echo form_label('CPF');
echo form_input(array('name' => 'usuariosCpf'), set_value('usuariosCpf'));

echo form_label('CEP');
echo form_input(array('name' => 'usuariosCep'), set_value('usuariosCep'));

echo form_label('Senha');
echo form_password(array('name' => 'usuariosSenha'), set_value('usuariosSenha'));

echo form_label('Repita a senha');
echo form_password(array('name' => 'usuariosSenha2'), set_value('usuariosSenha2'));


echo form_submit('cadastrar','Cadastrar');
echo form_close();