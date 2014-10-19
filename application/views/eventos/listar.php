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

echo "<h1>&nsc; Lista de Eventos</h1>";
foreach ($eventos as $linha) {
    $this->table->set_heading('ID', 'Nome', 'Descrição', 'Email', 'Visível', 'Operações');
    $this->table->add_row($linha->eventosId, $linha->eventosNome, $linha->eventosDescricao, $linha->eventosEmail, $linha->eventosVisibilidade, anchor("eventos/alterar/$linha->eventosId", 'Alterar') . " - " . anchor("eventos/deletar/$linha->eventosId", 'Excluir'));
}

echo $this->table->generate();

