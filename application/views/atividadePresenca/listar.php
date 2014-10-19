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

echo "<h1>&nsc; Lista de Atividades</h1>";
foreach ($atividades as $linha) {
    $this->table->set_heading('ID', 'Nome', 'Descrição', 'Tipo da Atividade', 'Data de Inicio', 'Data de Termino', 'Visivel', 'Operações');
    $this->table->add_row($linha->atividadesId, $linha->atividadesNome, $linha->atividadesDescricao, $this->atividades_model->obter_atividadeTipo_por_atividade($linha->atividadesId)->atividadesTiposNome, $linha->atividadesDataInicio, $linha->atividadesDataTermino, $linha->atividadesVisibilidade, anchor("atividades/alterar/$linha->atividadesId", 'Alterar') . " - " . anchor("atividades/deletar/$linha->atividadesId", 'Excluir'));
}

echo $this->table->generate();

