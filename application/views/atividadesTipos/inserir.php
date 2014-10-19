<?php 

echo "<h1>&nsc; Cadastro de Tipo de Atividades</h1>";

echo form_open('atividadesTipos/inserir');

echo validation_errors("<p class='mensagem-erro'>","<p>");

echo form_label('Nome');
echo form_input(array('name' => 'atividadesTiposNome'), set_value('atividadesTiposNome'), 'autofocus');

echo form_submit(array('name' => 'cadastrar'), 'Cadastrar');
echo form_close();
