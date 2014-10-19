<?php 
$inscricoesId = $this->uri->segment(3);
if($inscricoesId == null) {
    redirect('inscricoes/listar');
} 
$query = $this->inscricoes_model->obter_inscricoes_por_id($inscricoesId);
$queryAtividade = $this->atividades_model->obter_atividade_por_id($query->inscricoesAtividadesId);
$queryEvento = $this->eventos_model->obter_evento_por_id($queryAtividade->atividadesEventosId);
echo "<h1>&nsc; Deletar/Cancelar Inscrição</h1>";

echo form_open("inscricoes/deletar/$inscricoesId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Evento');
echo form_input(array('name' => 'inscricoesEventosNome'), set_value('inscricoesEventosNome', $queryEvento->eventosNome),'disabled');

echo form_label('Atividade');
echo form_input(array('name' => 'inscricoesAtividadesNome'), set_value('inscricoesAtividadesNome', $queryAtividade->atividadesNome),'disabled');

echo form_hidden('inscricoesId', $query->inscricoesId);

echo form_submit(array('name' => 'excluir'), 'Excluir');
echo form_close();
