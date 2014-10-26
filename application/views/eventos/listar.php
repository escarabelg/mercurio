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
?>
<div class="container">
    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="panel panel-default panel-body">

            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listagem de eventos no sistema</h3>
            </div>

            <div class="body">
                <?php
                foreach ($eventos as $linha) {
                    $this->table->set_heading('ID', 'Nome', 'Descrição', 'Email', 'Visível', 'Operações');
                    $this->table->add_row($linha->eventosId, $linha->eventosNome, $linha->eventosDescricao, $linha->eventosEmail, $linha->eventosVisibilidade, anchor("eventos/alterar/$linha->eventosId", 'Alterar') . " - " . anchor("eventos/deletar/$linha->eventosId", 'Excluir'));
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

