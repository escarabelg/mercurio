
<div class="caixa-menu">
    <p>&nsc;Usuários:
            <?php echo anchor('usuarios/inserir', 'C').anchor('usuarios/listar', 'R').anchor('usuarios/alterar', 'U').anchor('usuarios/deletar', 'D'); ?>
        <br/>
        &nsc;Eventos:
        <?php echo anchor('eventos/inserir', 'C').anchor('eventos/listar', 'R').anchor('eventos/alterar', 'U').anchor('eventos/deletar', 'D'); ?>
        <br/>
        &nsc;Atividades:
        <?php echo anchor('atividades/inserir', 'C').anchor('atividades/listar', 'R').anchor('atividades/alterar', 'U').anchor('atividades/deletar', 'D'); ?>
        <br/>
        &nsc;Tipo de Atividade:
        <?php echo anchor('atividadesTipos/inserir', 'C').anchor('atividadesTipos/listar', 'R').anchor('atividadesTipos/alterar', 'U').anchor('atividadesTipos/deletar', 'D'); ?>
        <br/>
        &nsc;Arquivos:
        <?php echo anchor('arquivos/inserir', 'C').anchor('arquivos/listar', 'R').anchor('arquivos/avaliar', '|Avaliar|').anchor('arquivos/deletar', 'D'); ?>
        <br/>
        &nsc;Inscricoes:
        <?php echo anchor('inscricoes/inserir', 'C').anchor('inscricoes/listar', 'R').anchor('inscricoes/deletar', 'D'); ?>
        <br/>
        <?php
        $data = $this->session->all_userdata();
        if (element('usuario-id', $data) != null) {
            echo "&nsc;";
            echo "<span class='mensagem-sucesso'>";
            echo "Olá, " . $this->session->userdata('usuario-email') . "</span> - " . anchor('usuarios/logout', 'Logout');
        } else {
            echo "&nsc;";
            echo anchor('usuarios/login', 'Faça seu Login');
        }
        ?>
    </p>
    <hr/>
</div>