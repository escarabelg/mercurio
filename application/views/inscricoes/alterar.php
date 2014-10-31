<?php 
$atividadesId = $this->uri->segment(3);
if($atividadesId == null) {
    redirect('atividades/listar');
} 
$query = $this->atividades_model->obter_atividade_por_id($atividadesId);
echo "<h1>&nsc; Alterar Evento</h1>";

echo form_open("atividades/alterar/$atividadesId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

foreach($eventos as $row) {$evento[$row->eventosId] = $row->eventosNome;}

echo form_label('Evento');
echo form_dropdown('atividadesEventosId', $evento);

foreach($usuarios as $row) {$usuario[$row->usuariosId] = $row->usuariosNome;}

echo form_label('Palestrante');
echo form_dropdown('atividadesPalestrantesId', $usuario);

foreach($atividades as $row) {$atividade[$row->atividadesTiposId] = $row->atividadesTiposNome;}

echo form_label('Tipo da Atividade');
echo form_dropdown('atividadesTipoId', $atividade);

echo form_label('Nome');
echo form_input(array('name' => 'atividadesNome'), set_value('atividadesNome', $query->atividadesNome), 'autofocus');

echo form_label('Descrição');
echo form_input(array('name' => 'atividadesDescricao'), set_value('atividadesDescricao', $query->atividadesDescricao));

echo form_label('Data de inicio');
echo form_input(array('name' => 'atividadesDataInicio'), set_value('atividadesDataInicio', $query->atividadesDataInicio));

echo form_label('Data de término');
echo form_input(array('name' => 'atividadesDataTermino'), set_value('atividadesDataTermino', $query->atividadesDataTermino));

echo form_label('Local');
echo form_input(array('name' => 'atividadesLocal'), set_value('atividadesLocal', $query->atividadesLocal));

echo form_label('Carga Horária');
echo form_input(array('name' => 'atividadesCargaHoraria'), set_value('atividadesCargaHoraria', $query->atividadesCargaHoraria));

echo form_label('Vagas');
echo form_input(array('name' => 'atividadesVagas'), set_value('atividadesVagas', $query->atividadesVagas));

echo form_label('Valor');
echo form_input(array('name' => 'atividadesValor'), set_value('atividadesValor', $query->atividadesValor));

echo form_label('Visivel');
echo form_dropdown('atividadesVisibilidade',array('S' => 'Sim', 'N' => 'Não'));

echo form_hidden('atividadesId', $query->atividadesId);

echo form_submit(array('name' => 'alterar'), 'Alterar');
echo form_close();
