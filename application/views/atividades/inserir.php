<?php

echo "<h1>&nsc; Cadastro de Atividades</h1>";

echo form_open('atividades/inserir');

echo validation_errors("<p class='mensagem-erro'>", "<p>");

$evento = new ArrayObject;
foreach ($eventos as $row) {
    $evento[$row->eventosId] = $row->eventosNome;
}

echo form_label('Evento');
echo form_dropdown('atividadesEventosId', $evento);
if ($this->input->post('atividadesEventosId') != null) {
    $usuario = new ArrayObject;
    foreach ($usuarios as $row) {
        $usuario[$row->usuariosId] = $row->usuariosNome;
    }

    echo form_label('Palestrante');
    echo form_dropdown('atividadesPalestrantesId', $usuario);

    $atividade = new ArrayObject;
    foreach ($atividades as $row) {
        $atividade[$row->atividadesTiposId] = $row->atividadesTiposNome;
    }

    echo form_label('Tipo da Atividade');
    echo form_dropdown('atividadesTipoId', $atividade);

    echo form_label('Nome');
    echo form_input(array('name' => 'atividadesNome'), set_value('atividadesNome'), 'autofocus');

    echo form_label('Descrição');
    echo form_input(array('name' => 'atividadesDescricao'), set_value('atividadesDescricao'));

    echo form_label('Data Inicio');
    echo "<select name='atividadesDataInicio'>";
    for ($i = 0; $i <= sizeof($data) - 1; $i++) {
        echo "<option value='$data[$i]'> $data[$i] </option>";
    }
    echo "</select>";

    echo form_label('Data Término');
    echo "<select name='atividadesDataTermino'>";
    for ($i = 0; $i <= sizeof($data) - 1; $i++) {
        echo "<option value='$data[$i]'> $data[$i] </option>";
    }
    echo "</select>";

    echo form_label('Local');
    echo form_input(array('name' => 'atividadesLocal'), set_value('atividadesLocal'));

    echo form_label('Carga Horária');
    echo form_input(array('name' => 'atividadesCargaHoraria'), set_value('atividadesCargaHoraria'));

    echo form_label('Vagas');
    echo form_input(array('name' => 'atividadesVagas'), set_value('atividadesVagas'));

    echo form_label('Valor');
    echo form_input(array('name' => 'atividadesValor'), set_value('atividadesValor'));

    echo form_label('Visivel');
    echo form_dropdown('atividadesVisibilidade', array('S' => 'Sim', 'N' => 'Não'));

    echo form_hidden('atividadesCriadorId', $this->session->userdata('usuario-id'));

    echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
} else {
    echo form_submit(array('name' => 'gerar'), 'Gerar Campos');
}
echo form_close();
