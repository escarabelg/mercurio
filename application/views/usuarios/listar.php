<?php

if ($this->session->flashdata('cadastro-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('cadastro-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

if ($this->session->flashdata('login-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('login-ok') . "</p>";
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


echo "<h1>&nsc; Lista de Usuários</h1>";
foreach ($usuarios as $linha) {
    $this->table->set_heading('ID', 'Nome Completo', 'E-mail', 'CPF', 'CEP', 'Operações');
    $this->table->add_row($linha->usuariosId, $linha->usuariosNome, $linha->usuariosEmail, $linha->usuariosCpf, $linha->usuariosCep, anchor("usuarios/alterar/$linha->usuariosId", 'Alterar') . " - " . anchor("usuarios/deletar/$linha->usuariosId", 'Excluir'));
}

echo $this->table->generate();

