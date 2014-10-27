<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
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
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span>&nbsp;&nbsp;&nbsp;Filtragem de artigos</h3>
            </div>
            <?php
            echo form_open("arquivos/listar", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                            <label class="control-label">Selecione o Evento</label>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-link"></span>
                                <select class="form-control" name="arquivosEventosId">
                                    <?php
                                    foreach ($eventos as $row) {
                                     echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                     }
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <?php echo form_submit(array('name' => 'pesquisar', 'class' => 'btn btn-default'), 'Pesquisar'); ?>
                                </span>
                            </div>
                        </div>
                         <?php echo form_close(); ?>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12 col-lg-12 col-xs-12">
        <?php if ($this->input->post('arquivosEventosId') != null) { ?>
        <div class="panel panel-default panel-body">

            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listagem de artigos no sistema</h3>
            </div>

            <div class="body">
                <?php
                    foreach ($arquivos as $linha) {
                        $this->table->set_heading('ID', 'Titulo', 'File', 'Descrição', 'Status', 'Operações');
                        $this->table->add_row($linha->arquivosId, $linha->arquivosTitulo, anchor("$linha->arquivosFile", $linha->arquivosFile), $linha->arquivosDescricao, $linha->arquivosStatus, anchor("arquivos/deletar/$linha->arquivosId", 'Excluir'));
                    }
                    echo "<div class='section'>";
                    $tmpl = array('table_open' => '<table class="table table-striped table-hover">');
                    $this->table->set_template($tmpl);
                    echo $this->table->generate();
                }
                echo "</div>";
                ?>
            </div>

        </div>
    </div>
</div>


