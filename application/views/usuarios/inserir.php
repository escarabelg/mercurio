<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Registration Page</title>
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
            <div class="header">Register New Membership</div>
            <div class="body bg-gray">
                <div class="form-group">
                    <?php echo form_input(array('name' => 'usuariosNome', 'class' => 'form-control', 'placeholder' => 'Nome Completo'), set_value('usuariosNome')) ?>
                </div>
                <div class="form-group">
                    <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control', 'placeholder' => 'Email'), set_value('usuariosEmail')) ?>
                </div>
                <div class="form-group">
                    <?php echo form_input(array('name' => 'usuariosCpf', 'class' => 'form-control', 'placeholder' => 'CPF'), set_value('usuariosCpf')) ?>
                </div>
                <div class="form-group">
                    <?php echo form_password(array('name' => 'usuariosSenha', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('usuariosSenha')) ?>
                </div>
                <div class="form-group">
                    <?php echo form_password(array('name' => 'usuariosSenha2', 'class' => 'form-control', 'placeholder' => 'Repita a senha'), set_value('usuariosSenha2')) ?>
                </div>
            </div>
            <div class="footer">                    
                <?php
                echo form_submit(array('name' => 'cadastrar', 'class' => 'btn bg-olive btn-block'), 'Cadastrar');
                echo form_close();
                ?>


                <a href="<?php echo base_url(); ?>usuarios/login" class="text-center">Eu já possuo uma conta</a>
            </div>
        </form>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>