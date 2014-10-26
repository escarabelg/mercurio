<div class="container">
    <div class="col-md-12 col-lg-12 col-xs-12">
  <?php
        if ($this->session->flashdata('cadastro-ok')) {
    echo "<div class = 'alert alert-success alert-dismissable'>";
    echo "<i class = 'fa fa-check'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Sucesso! </b>" . $this->session->flashdata('cadastro-ok');
    echo "</div>";
}
        if ($this->session->flashdata('alterar-ok')) {
    echo "<div class = 'alert alert-success alert-dismissable'>";
    echo "<i class = 'fa fa-check'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Sucesso! </b>" . $this->session->flashdata('alterar-ok');
    echo "</div>";
}
        if ($this->session->flashdata('deletar-ok')) {
    echo "<div class = 'alert alert-success alert-dismissable'>";
    echo "<i class = 'fa fa-check'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Sucesso! </b>" . $this->session->flashdata('deletar-ok');
    echo "</div>";
}
?>
        <div class="panel panel-default panel-body">

            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listagem de atividades no sistema</h3>
            </div>

            <div class="body">
                <?php
                foreach ($atividades as $linha) {
    $this->table->set_heading('ID', 'Nome', 'Descrição', 'Tipo da Atividade', 'Data de Inicio', 'Data de Termino', 'Visivel', 'Operações');
    $this->table->add_row($linha->atividadesId, $linha->atividadesNome, $linha->atividadesDescricao, $this->atividades_model->obter_atividadeTipo_por_atividade($linha->atividadesId)->atividadesTiposNome, $linha->atividadesDataInicio, $linha->atividadesDataTermino, $linha->atividadesVisibilidade, anchor("atividades/alterar/$linha->atividadesId", 'Alterar') . " - " . anchor("atividades/deletar/$linha->atividadesId", 'Excluir'));
}
                echo "<div class='section'>";
                $tmpl = array('table_open' => '<table class="table table-striped table-hover">');
                $this->table->set_template($tmpl);
                echo $this->table->generate();
                echo "</div>";
                ?>
            </div>

        </div>
    </div>
</div>


