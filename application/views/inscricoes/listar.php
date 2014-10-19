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

if ($this->session->flashdata('cadastro-erro')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-erro'>" . $this->session->flashdata('cadastro-erro') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

echo "<h1>&nsc; Lista de Inscrições</h1>";
foreach ($inscricoes as $linha) {
    $this->table->set_heading('ID', 'Usuário', 'Atividade', 'Evento', 'Operações');
    $eventoId = $this->atividades_model->obter_atividade_por_id($linha->inscricoesAtividadesId)->atividadesEventosId;
    $this->table->add_row($linha->inscricoesId, $this->usuarios_model->obter_usuario_por_id($linha->inscricoesUsuariosId)->row()->usuariosNome, $this->atividades_model->obter_atividade_por_id($linha->inscricoesAtividadesId)->atividadesNome, $this->eventos_model->obter_evento_por_id($eventoId)->eventosNome,anchor("inscricoes/deletar/$linha->inscricoesId", 'Excluir'));
}

echo $this->table->generate();

