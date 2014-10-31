<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Mercurio | Registro</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <?php
            echo form_open('usuarios/inserir');
            echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");
            ?>
            <div class="header">Registro de usuário</div>
            <div class="body bg-gray">
                <div class="form-group">
                    <div class="input-group">
<<<<<<< HEAD
                        <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'usuariosNome', 'class' => 'form-control', 'placeholder' => 'Nome Completo'), set_value('usuariosNome')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control', 'placeholder' => 'Email'), set_value('usuariosEmail')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'usuariosCpf', 'class' => 'form-control', 'placeholder' => 'CPF', 'id' => 'cpf'), set_value('usuariosCpf')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                        <?php echo form_password(array('name' => 'usuariosSenha', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('usuariosSenha')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                        <?php echo form_password(array('name' => 'usuariosSenha2', 'class' => 'form-control', 'placeholder' => 'Repita a senha'), set_value('usuariosSenha2')) ?>
                    </div>
=======
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                    <?php echo form_input(array('name' => 'usuariosNome', 'class' => 'form-control', 'placeholder' => 'Nome Completo'), set_value('usuariosNome')) ?>
                </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control', 'placeholder' => 'Email'), set_value('usuariosEmail')) ?>
                </div>
                </div>
                <div class="form-group">
                                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                    <?php echo form_input(array('name' => 'usuariosCpf', 'class' => 'form-control', 'placeholder' => 'CPF'), set_value('usuariosCpf')) ?>
                </div>
                </div>
                <div class="form-group">
                     <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                    <?php echo form_password(array('name' => 'usuariosSenha', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('usuariosSenha')) ?>
                </div>
                </div>
                <div class="form-group">
                     <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-asterisk"></span>
                    <?php echo form_password(array('name' => 'usuariosSenha2', 'class' => 'form-control', 'placeholder' => 'Repita a senha'), set_value('usuariosSenha2')) ?>
                </div>
>>>>>>> 576b1f11a812e8d3c06366837ed884f1899fe7b1
                </div>
            </div>
            <div class="footer">                    
                <?php
                echo form_submit(array('name' => 'cadastrar', 'class' => 'btn bg-olive btn-block'), 'Cadastrar');
                echo form_close();
                ?>


                <a href="<?php echo base_url(); ?>usuarios/login" class="text-center">Me tire daqui!, Já possuo uma conta.</a>
            </div>
        </form>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<<<<<<< HEAD
    <script src="<?php echo base_url();?>assets/js/jquery.maskedinput.js" type="text/javascript"></script>
            <script type="text/javascript">
        jQuery(function ($) {
            $("#date").mask("99/99/9999", {placeholder: "mm/dd/yyyy"});
            $("#phone").mask("(99) 9999-9999");
            $("#tin").mask("99-9999999");
            $("#cpf").mask("999.999.999-99");
            $("#ssn").mask("999-99-9999");
        });
    </script> 
=======

>>>>>>> 576b1f11a812e8d3c06366837ed884f1899fe7b1
</body>
</html>