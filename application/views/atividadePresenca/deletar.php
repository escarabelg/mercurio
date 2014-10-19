<?php 
$atividadesId = $this->uri->segment(3);
if($atividadesId == null) {
    redirect('atividades/listar');
} 
$query = $this->atividades_model->obter_atividade_por_id($atividadesId);
echo "<h1>&nsc; Deletar Evento</h1>";

echo form_open("atividades/deletar/$atividadesId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Evento');
echo form_input(array('name' => 'atividadesEventosNome'), set_value('atividadesNome', $this->atividades_model->obter_evento_por_atividade($query->atividadesId)->eventosNome),'disabled');

echo form_label('Palestrante');
echo form_input(array('name' => 'atividadesPalestranteNome'), set_value('atividadesPalestranteId', $this->atividades_model->obter_palestrante_por_atividade($query->atividadesId)->usuariosNome),'disabled');

echo form_label('Tipo da Atividade');
echo form_input(array('name' => 'atividadesTipoId'), set_value('atividadesTipoId', $this->atividades_model->obter_atividadeTipo_por_atividade($query->atividadesId)->atividadesTiposNome),'disabled');

echo form_label('Nome');
echo form_input(array('name' => 'atividadesNome'), set_value('atividadesNome', $query->atividadesNome),'disabled');

echo form_label('Descrição');
echo form_input(array('name' => 'atividadesDescricao'), set_value('atividadesDescricao', $query->atividadesDescricao),'disabled');

echo form_label('Data de inicio');
echo form_input(array('name' => 'atividadesDataInicio'), set_value('atividadesDataInicio', $query->atividadesDataInicio),'disabled');

echo form_label('Data de término');
echo form_input(array('name' => 'atividadesDataTermino'), set_value('atividadesDataTermino', $query->atividadesDataTermino),'disabled');

echo form_label('Local');
echo form_input(array('name' => 'atividadesLocal'), set_value('atividadesLocal', $query->atividadesLocal),'disabled');

echo form_label('Carga Horária');
echo form_input(array('name' => 'atividadesCargaHoraria'), set_value('atividadesCargaHoraria', $query->atividadesCargaHoraria),'disabled');

echo form_label('Vagas');
echo form_input(array('name' => 'atividadesVagas'), set_value('atividadesVagas', $query->atividadesVagas),'disabled');

echo form_label('Valor');
echo form_input(array('name' => 'atividadesValor'), set_value('atividadesValor', $query->atividadesValor),'disabled');

echo form_label('Visivel');
echo form_input('atividadesVisibilidade',set_value('atividadesValor', $query->atividadesVisibilidade),'disabled');

echo form_hidden('atividadesId', $query->atividadesId);

echo form_submit(array('name' => 'excluir'), 'Excluir');
echo form_close();
