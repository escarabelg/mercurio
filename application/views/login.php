<?php ?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Mercurio | Log in</title>
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
if ($this->session->flashdata('login-erro')) {
    echo "<div class = 'alert alert-danger alert-dismissable'>";
    echo "<i class = 'fa fa-ban'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Erro! </b>" . $this->session->flashdata('login-erro');
    echo "</div>";
}
if ($this->session->flashdata('sem-permissao')) {
    echo "<div class = 'alert alert-danger alert-dismissable'>";
    echo "<i class = 'fa fa-ban'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Erro! </b>" . $this->session->flashdata('sem-permissao');
    echo "</div>";
}
if ($this->session->flashdata('retrieve-action')) {
    echo "<div class = 'alert alert-danger alert-dismissable'>";
    echo "<i class = 'fa fa-ban'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Erro! </b>" . $this->session->flashdata('retrieve-action');
    echo "</div>";
}
if ($this->session->flashdata('cadastro-ok')) {
    echo "<div class = 'alert alert-success alert-dismissable'>";
    echo "<i class = 'fa fa-check'></i>";
    echo "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;";
    echo "</button>";
    echo "<b>Sucesso! </b>" . $this->session->flashdata('cadastro-ok');
    echo "</div>";
}
?>

            <?php
            echo form_open('usuarios/login');
            echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");
            ?>
            <div class="header">Área de login</div>

            <div class="body bg-gray">
                <div class="form-group">
            <?php echo form_input(array('name' => 'usuariosEmail', 'class' => 'form-control', 'placeholder' => 'Email'), set_value('usuariosEmail')) ?>
                </div>
                <div class="form-group">
<?php echo form_password(array('name' => 'usuariosSenha', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('usuariosSenha')) ?>
                </div>          
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Remember me
                </div>
            </div>
            <div class="footer">                                               
                    <?php
                    echo form_submit(array('name' => 'entrar', 'class' => 'btn bg-olive btn-block'), 'Entrar');
                    echo form_close();
                    ?>


                <p><a href="#">Esqueci minha senha</a></p>

                <a href="<?php echo base_url(); ?>usuarios/inserir" class="text-center">Ainda não é um membro? Crie uma conta agora!</a>
            </div>
        </form>


    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
