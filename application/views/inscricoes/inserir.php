<?php

echo "<h1>&nsc; Realizar Inscrição em Atividade</h1>";

echo form_open('inscricoes/inserir');

echo validation_errors("<p class='mensagem-erro'>", "<p>");

$evento = new ArrayObject;
foreach ($eventos as $row) {
    $evento[$row->eventosId] = $row->eventosNome;
}

echo form_label('Evento');
echo form_dropdown('inscricoesEventosId', $evento);

if ($this->input->post('inscricoesEventosId') != NULL) {

    $atividade = new ArrayObject;
    foreach ($atividades as $row) {
        $atividade[$row->atividadesId] = $row->atividadesNome;
    }

    echo form_label('Atividades');
    echo form_dropdown('inscricoesAtividadesId', $atividade);

    echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
} else {
    echo form_submit(array('name' => 'Pesquisar'), 'Pesquisar');
}
echo form_hidden('inscricoesUsuariosId', $this->session->userdata('usuario-id'));


echo form_close();
