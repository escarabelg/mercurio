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
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>"); ?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span>&nbsp;&nbsp;&nbsp;Filtragem de atividades</h3>
            </div>
            <?php
            echo form_open("atividades/listar", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Selecione o Evento</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-link"></span>
                            <select class="form-control" name="atividadesEventosId">
                                <?php
                                foreach ($eventos as $row) {
                                    echo "<option value=$row->eventosId> $row->eventosNome </option>";
                                }
                                ?>
                            </select>
                            <span class="input-group-btn">
                                <?php echo form_submit(array('name' => 'filtrar', 'class' => 'btn btn-default'), 'Filtrar'); ?>
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

<?php if ($this->input->post('filtrar') != null) { ?>
    <div class="container">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="panel panel-default panel-body">

                <div class="panel-heading bg-gray">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Listagem de atividades no sistema</h3>
                </div>

                <div class="body">
                    <?php
                    foreach ($atividades as $linha) {
                        if ($linha->atividadesEventosId == $this->input->post('atividadesEventosId')) {
                            $ativi = $this->atividades_model->atividade_possui_vagas($linha->atividadesId);
                            if ($ativi->atividadesVagasOcupadas == $ativi->atividadesVagasTotal) {
                                $ativi = "<b class='mensagem-erro'>LOTADO</b>";
                            } else {
                                $ativi = $ativi->atividadesVagasOcupadas . "/" . $ativi->atividadesVagasTotal;
                            }
                            $this->table->set_heading('ID', 'Nome', 'Descrição', 'Tipo da Atividade', 'Data de Inicio', 'Data de Termino', 'Visivel', 'Vagas Disponíveis', 'Operações');
                            $this->table->add_row($linha->atividadesId, $linha->atividadesNome, $linha->atividadesDescricao, $this->atividades_model->obter_atividadeTipo_por_atividade($linha->atividadesId)->atividadesTiposNome, $linha->atividadesDataInicio, $linha->atividadesDataTermino, $linha->atividadesVisibilidade, $ativi, anchor("atividades/alterar/$linha->atividadesId", 'Alterar') . " - " . anchor("atividades/deletar/$linha->atividadesId", 'Excluir'));
                        }
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
<?php } ?>


