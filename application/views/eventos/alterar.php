<?php 
$eventosId = $this->uri->segment(3);
if($eventosId == null) {
    redirect('eventos/listar');
} 
$query = $this->eventos_model->obter_evento_por_id($eventosId);
echo "<h1>&nsc; Alterar Evento</h1>";

echo form_open("eventos/alterar/$eventosId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Nome');
echo form_input(array('name' => 'eventosNome'), set_value('eventosNome', $query->eventosNome), 'autofocus');

echo form_label('Descrição');
echo form_input(array('name' => 'eventosDescricao'), set_value('eventosDescricao', $query->eventosDescricao));

echo form_label('E-mail');
echo form_input(array('name' => 'eventosEmail'), set_value('eventosEmail', $query->eventosEmail), 'disabled');

echo form_label('Data de inicio');
echo form_input(array('name' => 'eventosDataInicio'), set_value('eventosDataInicio', $query->eventosDataInicio));

echo form_label('Data de término');
echo form_input(array('name' => 'eventosDataTermino'), set_value('eventosDataTermino', $query->eventosDataTermino));

echo form_label('Local');
echo form_input(array('name' => 'eventosLocal'), set_value('eventosLocal', $query->eventosLocal));

echo form_label('CEP');
echo form_input(array('name' => 'eventosCep'), set_value('eventosCep', $query->eventosCep));

echo form_label('Endereço');
echo form_input(array('name' => 'eventosEndereco'), set_value('eventosEndereco', $query->eventosEndereco));

echo form_label('Bairro');
echo form_input(array('name' => 'eventosBairro'), set_value('eventosBairro', $query->eventosBairro));

echo form_label('Número');
echo form_input(array('name' => 'eventosNumero'), set_value('eventosNumero', $query->eventosNumero));

echo form_label('Estado');
echo form_input(array('name' => 'eventosEstado'), set_value('eventosEstado', $query->eventosEstado));

echo form_label('Cidade');
echo form_input(array('name' => 'eventosCidade'), set_value('eventosCidade', $query->eventosCidade));

echo form_label('Valor');
echo form_input(array('name' => 'eventosValor'), set_value('eventosValor', $query->eventosValor));

echo form_label('Visivel');
echo form_dropdown('eventosVisibilidade',array('S' => 'Sim', 'N' => 'Não'));

echo form_hidden('eventosId', $query->eventosId);

echo form_submit(array('name' => 'alterar'), 'Alterar');
echo form_close();
