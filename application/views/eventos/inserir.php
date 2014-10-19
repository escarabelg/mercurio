<?php 

echo "<h1>&nsc; Cadastro de Eventos</h1>";

echo form_open('eventos/inserir');

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Nome');
echo form_input(array('name' => 'eventosNome'), set_value('eventosNome'), 'autofocus');

echo form_label('Descrição');
echo form_input(array('name' => 'eventosDescricao'), set_value('eventosDescricao'));

echo form_label('E-mail');
echo form_input(array('name' => 'eventosEmail'), set_value('eventosEmail'));

echo form_label('Data de inicio');
echo form_input(array('name' => 'eventosDataInicio'), set_value('eventosDataInicio'));

echo form_label('Data de término');
echo form_input(array('name' => 'eventosDataTermino'), set_value('eventosDataTermino'));

echo form_label('Local');
echo form_input(array('name' => 'eventosLocal'), set_value('eventosLocal'));

echo form_label('CEP');
echo form_input(array('name' => 'eventosCep'), set_value('eventosCep'));

echo form_label('Endereço');
echo form_input(array('name' => 'eventosEndereco'), set_value('eventosEndereco'));

echo form_label('Bairro');
echo form_input(array('name' => 'eventosBairro'), set_value('eventosBairro'));

echo form_label('Número');
echo form_input(array('name' => 'eventosNumero'), set_value('eventosNumero'));

echo form_label('Estado');
echo form_input(array('name' => 'eventosEstado'), set_value('eventosEstado'));

echo form_label('Cidade');
echo form_input(array('name' => 'eventosCidade'), set_value('eventosCidade'));

echo form_label('Valor');
echo form_input(array('name' => 'eventosValor'), set_value('eventosValor'));

echo form_label('Visivel');
echo form_dropdown('eventosVisibilidade',array('S' => 'Sim', 'N' => 'Não'));

echo form_hidden('eventosCriadorId', $this->session->userdata('usuario-id'));

echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
echo form_close();
