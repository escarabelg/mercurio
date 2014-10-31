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
        if ($this->session->flashdata('login-ok')) {
    echo "<div class = 'alert alert-success alert-dismissable'>";
    echo "<i class = 'fa fa-check'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Sucesso! </b>" . $this->session->flashdata('login-ok');
    echo "</div>";
}
?>
        <div class="panel panel-default panel-body">

            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listagem de usuários no sistema</h3>
            </div>

            <div class="body">
                <?php
                foreach ($usuarios as $linha) {
                    $this->table->set_heading('ID', 'Nome Completo', 'E-mail', 'CPF', 'Operações');
                    $this->table->add_row($linha->usuariosId, $linha->usuariosNome, $linha->usuariosEmail, $linha->usuariosCpf, anchor("usuarios/alterar/$linha->usuariosId", 'Alterar') . " - " . anchor("usuarios/deletar/$linha->usuariosId", 'Excluir'));
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


