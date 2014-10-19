<?php 

echo "<h1>&nsc; Cadastro de Atividades</h1>";

echo form_open('atividades/inserir');

echo validation_errors("<p class='mensagem-erro'>","<p>");

$evento = new ArrayObject;
foreach($eventos as $row) {$evento[$row->eventosId] = $row->eventosNome;}

echo form_label('Evento');
echo form_dropdown('atividadesEventosId', $evento);

$usuario = new ArrayObject;
foreach($usuarios as $row) {$usuario[$row->usuariosId] = $row->usuariosNome;}

echo form_label('Palestrante');
echo form_dropdown('atividadesPalestrantesId', $usuario);

$atividade = new ArrayObject;
foreach($atividades as $row) {$atividade[$row->atividadesTiposId] = $row->atividadesTiposNome;}

echo form_label('Tipo da Atividade');
echo form_dropdown('atividadesTipoId', $atividade);

echo form_label('Nome');
echo form_input(array('name' => 'atividadesNome'), set_value('atividadesNome'), 'autofocus');

echo form_label('Descrição');
echo form_input(array('name' => 'atividadesDescricao'), set_value('atividadesDescricao'));

echo form_label('Data de inicio');
echo form_input(array('name' => 'atividadesDataInicio'), set_value('atividadesDataInicio'));

echo form_label('Data de término');
echo form_input(array('name' => 'atividadesDataTermino'), set_value('atividadesDataTermino'));

echo form_label('Local');
echo form_input(array('name' => 'atividadesLocal'), set_value('atividadesLocal'));

echo form_label('Carga Horária');
echo form_input(array('name' => 'atividadesCargaHoraria'), set_value('atividadesCargaHoraria'));

echo form_label('Vagas');
echo form_input(array('name' => 'atividadesVagas'), set_value('atividadesVagas'));

echo form_label('Valor');
echo form_input(array('name' => 'atividadesValor'), set_value('atividadesValor'));

echo form_label('Visivel');
echo form_dropdown('atividadesVisibilidade',array('S' => 'Sim', 'N' => 'Não'));

echo form_hidden('atividadesCriadorId', $this->session->userdata('usuario-id'));

echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
echo form_close();
