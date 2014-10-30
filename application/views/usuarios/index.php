<?php
echo form_open('usuarios/index');
$usuario = $this->session->userdata('usuario-id');
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php $titulo; ?></title>



        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url() ?>assets/sb-admin-2/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url() ?>assets/sb-admin-2/css/plugins/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url() ?>assets/sb-admin-2/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url() ?>assets/sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <style>
        .scroll {
            overflow: auto;
            height: 220px;
        }
    </style>
    <body>
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron col-lg-12">
            <div class="container">
                <h1>Seja bem vindo ao Mercurio!</h1>
                <p>Selecione abaixo o evento que deseja ver informações adicionais.</p>

                <div class="page-header">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-globe"></span>
                        <select class="form-control" name="eventosId">
                            <?php
                            foreach ($eventos as $row) {
                                echo "<option value=$row->eventosId> $row->eventosNome - $row->eventosDescricao</option>";
                            }
                            ?>
                        </select>
                        <span class="input-group-btn">
                            <?php echo form_submit(array('name' => 'gerar', 'class' => 'btn btn-warning'), 'Gerar Conteúdo'); ?>

                        </span>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>



                <?php if ($this->input->post('gerar') != null) { ?>
            </div>
                <!-- /.row -->

                <div class="jumbotron col-lg-12">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-archive fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $contador = 0;
                                            foreach ($atividadess as $linha) {
                                                $contador++;
                                            }
                                            echo $contador;
                                            ?>
                                        </div>
                                        <div>Total de inscricões!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $contador = 0;
                                            foreach ($arquivos as $linha) {
                                                if ($linha->arquivosCriadorId == $this->session->userdata('usuario-id')) {
                                                    if ($linha->arquivosStatus == 'A') {
                                                        $contador++;
                                                    }
                                                }
                                            }
                                            echo $contador;
                                            ?>
                                        </div>
                                        <div>Quantidade de Submissões Aprovadas!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $valor = 0;
                                            foreach ($atividades as $linha) {
                                                $valor += $linha->atividadesValor;
                                            }

                                            if (stripos($valor, ".") == false) {
                                                echo "R$ " . $valor . ",00";
                                            } else {
                                                echo "R$ " . str_replace(".", ",", $valor);
                                            }
                                            ?>
                                        </div>
                                        <div>Valor total gasto no evento!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ticket fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $valor = 0;
                                            foreach ($atividades as $linha) {
                                                $valor += $linha->atividadesValor;
                                            }

                                            if (stripos($valor, ".") == false) {
                                                echo "R$ " . $valor . ",00";
                                            } else {
                                                echo "R$ " . str_replace(".", ",", $valor);
                                            }
                                            ?>
                                        </div>
                                        <div>Ticktes Respondidos!</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="col-lg-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Atividades cadastradas
                                <div class="pull-right">
                                    <div class="btn-group">

                                    </div>
                                </div>
                            </div>
                        

                            <!-- /.panel-heading -->

                            <?php
                            foreach ($atividadess as $linha) {
                                if ($linha->atividadesEventosId == $this->input->post('eventosId')) {
                                    $ativi = $this->inscricoes_model->obter_inscricao_por_usuario($this->session->userdata('usuario-id'));
                                    if ($this->session->userdata('usuario-id') == $ativi->inscricoesUsuariosId) {

                                        $this->table->set_heading('Nome', 'Descrição', 'Tipo/Atividade', 'Dt.Inicio', 'Dt.Termino');
                                        $this->table->add_row($linha->atividadesNome, $linha->atividadesDescricao, $this->atividades_model->obter_atividadeTipo_por_atividade($linha->atividadesId)->atividadesTiposNome, $linha->atividadesDataInicio, $linha->atividadesDataTermino);
                                    }
                                }
                            }
                            echo "<div class='scroll section'>";
                            $tmpl = array('table_open' => '<table class="table table-striped table-hover">');
                            $this->table->set_template($tmpl);
                            echo $this->table->generate();
                            echo "</div>";
                            ?>
                        </div></div>

                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <i class="fa fa-legal fa-fw"></i> Artigos Submetidos
                                <div class="pull-right">
                                    <div class="btn-group">

                                    </div>
                                </div>
                            </div>
                            </

                            <!-- /.panel-heading -->

                            <?php
                            foreach ($arquivos as $linha) {
                                if ($linha->arquivosCriadorId == $this->session->userdata('usuario-id')) {
                                    $this->table->set_heading('Titulo', 'Arquivo', 'Status', 'Operações');
                                    $status = 0;
                                    if ($linha->arquivosStatus == 'A') {
                                        $status = "APROVADO";
                                        $this->table->add_row($linha->arquivosTitulo, anchor("$linha->arquivosFile", $linha->arquivosFile), $status, anchor('arquivos/detalhes','Ver Correção'));    
                                    } elseif ($linha->arquivosStatus == 'P') {
                                        $status = "PENDENTE";
                                        $this->table->add_row($linha->arquivosTitulo, anchor("$linha->arquivosFile", $linha->arquivosFile), $status, '<b>Sem correção</b>');    
                                    } elseif ($linha->arquivosStatus == 'R') {
                                        $status = "REPROVADO";
                                        $this->table->add_row($linha->arquivosTitulo, anchor("$linha->arquivosFile", $linha->arquivosFile), $status, anchor('arquivos/detalhes','Ver Correção'));    
                                    }
                                }
                            }
                            echo "<div class='scroll section'>";
                            $tmpl = array('table_open' => '<table class="table table-striped table-hover">');
                            $this->table->set_template($tmpl);
                            echo $this->table->generate();

                            echo "</div>";
                            ?>
                        </div></div>




                    <!-- /.col-lg-8 -->

                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
<?php } ?>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url() ?>assets/sb-admin-2/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/sb-admin-2/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/sb-admin-2/js/sb-admin-2.js"></script>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
</html>
<?php echo form_close(); ?>