<?php 
if ($this->session->flashdata('avaliar-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('avaliar-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

echo "<h1>&nsc; Área de Avaliação dos Artigos</h1>";
echo form_open("arquivos/avaliar");
echo validation_errors("<p class='mensagem-erro'", "</p>");

$evento = new ArrayObject;
foreach($eventos as $row) {$evento[$row->eventosId] = $row->eventosNome;}

echo form_label("Selecione o Evento");
echo form_dropdown('eventosId', $evento);

echo "<br/>";
if ($this->input->post('eventosId') != null) {
    $arquivo = new ArrayObject;
    foreach($arquivos as $row) {$arquivo[$row->arquivosId] = $row->arquivosTitulo;}

    echo form_label("Selecione o Artigo");
    echo form_dropdown('arquivosId', $arquivo);
    
    echo form_label("Status");
    echo form_dropdown('arquivosStatus', array('P' => "Pendente", 'A' => 'Aprovado', 'R' => 'Reprovado'));
    
    echo form_label("Informações adicionais");
    echo form_textarea('arquivosDescricao');
    
    echo form_submit('avaliar',"Avaliar");      
} else {
    echo form_submit('pesquisar',"Pesquisar");
}
    

echo form_close();