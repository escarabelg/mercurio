<?php

echo "<h1>&nsc; Atividades em que você está inscrito</h1>";
$usuarioId = $this->session->userdata('usuario-id');
foreach ($atividades as $linha) {
    $inscricoesId = $this->inscricoes_model->obter_inscricao_por_atividade_e_usuario($usuarioId, $linha->atividadesId)->inscricoesId;
    $this->table->set_heading('ID', 'Nome', 'Descrição', 'Tipo da Atividade', 'Data de Inicio', 'Data de Termino', 'Operações');
    $this->table->add_row($linha->atividadesId, $linha->atividadesNome, $linha->atividadesDescricao, $this->atividades_model->obter_atividadeTipo_por_atividade($linha->atividadesId)->atividadesTiposNome, $linha->atividadesDataInicio, $linha->atividadesDataTermino, anchor("inscricoes/deletar/$inscricoesId", 'Sair da Atividade'));
}

echo $this->table->generate();
