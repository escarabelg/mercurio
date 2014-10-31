<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titulo;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1) { ?>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav">
                    <li class="active"><span class="navbar-brand">
                                          <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                                              echo anchor("usuarios/administracao","Mercurio")."<span class='mensagem-erro'> beta</span>";
                                          }else{
                                              echo anchor("usuarios/index","Mercurio")."<span class='mensagem-erro'> beta</span>";
                                          } ?>
                                          </span></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#">Link</a></li> -->
                    <!-- Usuários -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('usuarios/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('usuarios/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('usuarios/alterar', 'Alterar'); ?></li>
                                <li><?php echo anchor('usuarios/deletar', 'Deletar'); ?></li>
                            <?php endif; ?> 
                        </ul>
                    </li>
                    <!-- Eventos -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eventos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('eventos/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('eventos/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('eventos/alterar', 'Alterar'); ?></li>
                                <li><?php echo anchor('eventos/deletar', 'Deletar'); ?></li>
                            <?php endif; ?> 
                        </ul>
                    </li>
                    <!-- Atividades -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('atividades/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('atividades/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('atividades/alterar', 'Alterar'); ?></li>
                                <li><?php echo anchor('atividades/deletar', 'Deletar'); ?></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Tipo de Atividades</li> 
                                <li><?php echo anchor('atividadesTipos/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('atividadesTipos/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('atividadesTipos/alterar', 'Alterar'); ?></li>
                                <li><?php echo anchor('atividadesTipos/deletar', 'Deletar'); ?></li>
                            <?php endif; ?>  
                        </ul>
                    </li>
                    <!-- Submissão -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Submissão <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('arquivos/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('arquivos/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('arquivos/avaliar', 'Avaliar'); ?></li>
                                <li><?php echo anchor('arquivos/deletar', 'Deletar'); ?></li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <!-- Inscrição -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inscrição <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('inscricoes/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('inscricoes/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('inscricoes/deletar', 'Deletar'); ?></li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <!-- Presença -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Presença<span class='mensagem-erro'> em desenvolvimento</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1): ?>
                                <li><?php echo anchor('atividadePresenca/inserir', 'Inserir'); ?></li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">Link</a></li> -->
                    <?php
                    $data = $this->session->all_userdata();
                    if (element('usuario-id', $data) != null) :
                        ?>
                        <li class="dropdown user user-menu">                
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <?php echo "<span>".$this->session->userdata('usuario-nome')."  <i class='caret'></i></span>"; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="dropdown notifications-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url(); ?>assets/img/avatar/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('usuario-nome'); ?>
                                        <?php 
                                       if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                                            echo "<small>ADMINISTRADOR</small>";
                                        } elseif (element('usuario-permissao', $this->session->all_userdata()) == 0) {
                                           echo "<small>CURSISTA</small>";
                                        }
                                        ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Inscrições</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">...</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">...</a>
                                    </div>
                                </li>
                                -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <p class="btn btn-default btn-flat"><?php echo anchor("usuarios/alterar/" . $this->session->userdata('usuario-id'), 'Editar perfil'); ?></p>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <p class="btn btn-default btn-flat"><?php echo anchor('usuarios/logout', 'Sign out'); ?></p>
                                    </div>
                                </li>
                            </ul>
                        </li>    

                        <?php
                    endif;
                    $data = $this->session->all_userdata();
                    if (element('usuario-id', $data) == null) :
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> Logar-se</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <?php } elseif (element('usuario-permissao', $this->session->all_userdata()) == 0) { ?>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav">
                    <li class="active"><span class="navbar-brand">
                                          <?php if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                                              echo anchor("usuarios/administracao","Mercurio")."<span class='mensagem-erro'> beta</span>";
                                          }else{
                                              echo anchor("usuarios/index","Mercurio")."<span class='mensagem-erro'> beta</span>";
                                          } ?>
                                          </span></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="#">Link</a></li> -->
                    
                    <!-- Atividades -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Atividades <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 0): ?>
                                <li><?php echo anchor('atividades/listar', 'Listar'); ?></li>
                            <?php endif; ?>  
                        </ul>
                    </li>
                    <!-- Submissão -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Submissão <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 0): ?>
                                <li><?php echo anchor('arquivos/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('arquivos/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('arquivos/deletar', 'Deletar'); ?></li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                    <!-- Inscrição -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inscrição <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (element('usuario-permissao', $this->session->all_userdata()) == 0): ?>
                                <li><?php echo anchor('inscricoes/inserir', 'Inserir'); ?></li>
                                <li><?php echo anchor('inscricoes/listar', 'Listar'); ?></li>
                                <li><?php echo anchor('inscricoes/deletar', 'Deletar'); ?></li>
                            <?php endif; ?>   
                        </ul>
                    </li>
                </ul>
                    

                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">Link</a></li> -->
                    <?php
                    $data = $this->session->all_userdata();
                    if (element('usuario-id', $data) != null) :
                        ?>
                        <li class="dropdown user user-menu">                
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <?php echo "<span>".$this->session->userdata('usuario-nome')."  <i class='caret'></i></span>"; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="dropdown notifications-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url(); ?>assets/img/avatar/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('usuario-nome'); ?>
                                        <?php 
                                       if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                                            echo "<small>ADMINISTRADOR</small>";
                                        } elseif (element('usuario-permissao', $this->session->all_userdata()) == 0) {
                                           echo "<small>CURSISTA</small>";
                                        }
                                        ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Inscrições</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">...</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">...</a>
                                    </div>
                                </li>
                                -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <p class="btn btn-default btn-flat"><?php echo anchor("usuarios/alterar/" . $this->session->userdata('usuario-id'), 'Editar perfil'); ?></p>
                                        &nbsp;
                                        <p class="btn btn-default btn-flat"><?php echo anchor("usuarios/deletar/" . $this->session->userdata('usuario-id'), 'Deletar'); ?></p>
                                    </div>
                                    <div class="pull-right">
                                        <p class="btn btn-default btn-flat"><?php echo anchor('usuarios/logout', 'Sign out'); ?></p>
                                    </div>
                                </li>
                            </ul>
                        </li>    

                        <?php
                    endif;
                    $data = $this->session->all_userdata();
                    if (element('usuario-id', $data) == null) :
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> Logar-se</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <?php } ?>
    
