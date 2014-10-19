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

echo "<h1>&nsc; Lista de Tipo de Atividades</h1>";
foreach ($atividadesTipos as $linha) {
    $this->table->set_heading('ID', 'Nome','Operações');
    $this->table->add_row($linha->atividadesTiposId, $linha->atividadesTiposNome, anchor("atividadesTipos/alterar/$linha->atividadesTiposId", 'Alterar') . " - " . anchor("atividadesTipos/deletar/$linha->atividadesTiposId", 'Excluir'));
}

echo $this->table->generate();

