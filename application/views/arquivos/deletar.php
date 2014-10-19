<?php 
$arquivosId = $this->uri->segment(3);
if($arquivosId == null) {
    redirect('arquivos/listar');
} 
$query = $this->arquivos_model->obter_arquivo_por_id($arquivosId);
echo "<h1>&nsc; Deletar Arquivo</h1>";

echo form_open("arquivos/deletar/$arquivosId");

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Titulo');
echo form_input(array('name' => 'arquivosTitulo'), set_value('arquivosTitulo', $query->arquivosTitulo),'disabled');

echo form_label('Status');
echo form_input(array('name' => 'arquivosStatus'), set_value('arquivosStatus', $query->arquivosStatus),'disabled');

echo form_hidden('arquivosId', $query->arquivosId);

echo form_submit(array('name' => 'excluir'), 'Excluir');
echo form_close();
