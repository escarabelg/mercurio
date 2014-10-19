<?php
if ($this->session->flashdata('login-erro')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-erro'>" . $this->session->flashdata('login-erro') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}
if ($this->session->flashdata('sem-permissao')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-erro'>" . $this->session->flashdata('sem-permissao') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}
if ($this->session->flashdata('retrieve-action')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-erro'>" . $this->session->flashdata('retrieve-action') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

if ($this->session->flashdata('cadastro-ok')) {
    echo "<div onload='dialog()' id='boxes'>";
    echo "<div id='dialog' class='window'>";
    echo "<p class='mensagem-sucesso'>" . $this->session->flashdata('cadastro-ok') . "</p>";
    echo "</div>";
    echo "<div id='mask'></div>";
    echo "</div>";
}

    echo "<div class='caixa-login'>";
    echo "<h1 class='area-login'>Área de Login</h1>";

    echo form_open('usuarios/login');
    echo validation_errors('<p>', '</p>');

    echo form_label('Email');
    echo form_input(array('name' => 'usuariosEmail'), set_value('usuariosEmail'));

    echo form_label('Senha');
    echo form_password(array('name' => 'usuariosSenha'));

    echo form_submit(array('name' => 'entrar'), 'Entrar');
    echo anchor('usuarios/inserir', ' Não possui uma conta?');
    echo form_close();
    ?>
</div>
