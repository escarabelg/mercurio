<?php

if ($this->session->flashdata('cadastro-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('cadastro-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

if ($this->session->flashdata('alterar-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('alterar-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

if ($this->session->flashdata('deletar-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('deletar-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

echo "<h1>&nsc; Lista de Arquivos</h1>";
echo form_open("arquivos/listar");
echo validation_errors("<p class='mensagem-erro'", "</p>");

$evento = new ArrayObject;
foreach($eventos as $row) {$evento[$row->eventosId] = $row->eventosNome;}

echo form_label("Selecione o Evento");
echo form_dropdown('eventosId', $evento);

echo form_submit('pesquisar',"Pesquisar");
echo form_close();
echo "<br/>";
if ($this->input->post('eventosId') != null) {
    foreach ($arquivos as $linha) {
        $this->table->set_heading('ID', 'Titulo', 'File', 'Descrição', 'Status', 'Operações');
        $this->table->add_row($linha->arquivosId, $linha->arquivosTitulo, anchor("$linha->arquivosFile",$linha->arquivosFile), $linha->arquivosDescricao, $linha->arquivosStatus, anchor("arquivos/deletar/$linha->arquivosId", 'Excluir'));
    }

    echo $this->table->generate();
}