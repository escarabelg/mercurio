<?php

echo "<h1>&nsc; Cadastro de Atividades</h1>";

echo form_open('atividadePresenca/inserir');

echo validation_errors("<p class='mensagem-erro'>", "<p>");

$evento = new ArrayObject;
foreach ($eventos as $row) {
    $evento[$row->eventosId] = $row->eventosNome;
}

echo form_label('Evento');
echo form_dropdown('atividadePresencaEventosId', $evento);

if ($this->input->post('atividadePresencaEventosId') != null) {
    $atividade = new ArrayObject;
    foreach ($atividades as $row) {
        $atividade[$row->atividadesId] = $row->atividadesNome;
    }

    echo form_label('Atividade');
    echo form_dropdown('atividadePresencaAtividadesId', $atividade);

    if ($this->input->post('atividadePresencaAtividadesId') != null) {
        $data = $this->atividades_model->obter_dataAtividade_mostrar_array($this->input->post('atividadePresencaAtividadesId'));
        echo form_label('Data');
        echo form_dropdown('atividadePresencaData', $data);
        $contador = 0;
        if ($this->input->post('atividadePresencaData') != null) {

            foreach ($inscricoes as $linha) {
                if ($linha->inscricoesAtividadesId == $this->input->post('atividadePresencaAtividadesId')) {
                    $this->table->set_heading('Usuário', 'Presente?');
                    $this->table->add_row($this->usuarios_model->obter_usuario_por_id($linha->inscricoesUsuariosId)->row()->usuariosNome, (form_checkbox(array('name' => 'atividadePresencaData'), set_value('atividadePresencaData'), 'checked')));
                    $contador++;
                }
            }
            if ($contador != 0) {
                echo $this->table->generate();
            } else {
                echo "<script language='javascript'>
                         alert('Não existe nenhum usuário cadastrado nesta atividade, por isso não foi possivel gerar a tabela de presença !');
                 </script>";
            }
        } else {
            echo form_submit(array('name' => 'pesquisar'), 'Pesquisar');
        }
    } else {
        echo form_submit(array('name' => 'pesquisar'), 'Pesquisar');
    }
} else {
    echo form_submit(array('name' => 'pesquisar'), 'Pesquisar');
}
if ($this->input->post('atividadePresencaAtividadesId') != null && $this->input->post('atividadePresencaEventosId') != null && $this->input->post('atividadePresencaData') != null) {

    echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
}
echo form_close();
?>