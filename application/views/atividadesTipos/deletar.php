<?php 
$atividadesTiposId = $this->uri->segment(3);
if($atividadesTiposId == null) {
    redirect('atividadesTipos/listar');
} 
$query = $this->atividadesTipos_model->obter_atividadesTipos_por_id($atividadesTiposId);
echo "<h1>&nsc; Deletar Tipo de Atividade</h1>";

echo form_open("atividadesTipos/deletar/$atividadesTiposId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Nome');
echo form_input(array('name' => 'atividadesTiposNome'), set_value('atividadesTiposNome', $query->atividadesTiposNome), 'disabled');

echo form_hidden('atividadesTiposId', $query->atividadesTiposId);

echo form_submit(array('name' => 'excluir'), 'Excluir');
echo form_close();
