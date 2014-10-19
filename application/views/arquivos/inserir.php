<?php 

echo "<h1>&nsc; Envio de Artigo</h1>";

echo form_open('arquivos/inserir');

echo validation_errors("<p class='mensagem-erro'>","<p>");

$usuario = new ArrayObject;
foreach($usuarios as $row) {$usuario[$row->usuariosId] = $row->usuariosNome;}

echo form_label('Orientador');
echo form_dropdown('arquivosOrientadorId', $usuario);

$evento = new ArrayObject;
foreach($eventos as $row) {$evento[$row->eventosId] = $row->eventosNome;}

echo form_label('Evento');
echo form_dropdown('arquivosEventosId', $evento);

echo form_label('Titulo');
echo form_input(array('name' => 'arquivosTitulo'), set_value('arquivosTitulo'));

echo form_label('Arquivo');
echo form_upload(array('name' => 'arquivosFile'), set_value('arquivosFile'));

echo form_hidden('arquivosCriadorId', $this->session->userdata('usuario-id'));

echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
echo form_close();
