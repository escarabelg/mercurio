<?php
$inscricoesId = $this->uri->segment(3);
if ($inscricoesId == null) {
    redirect('inscricoes/listar');
}
$query = $this->inscricoes_model->obter_inscricoes_por_id($inscricoesId);
$queryAtividade = $this->atividades_model->obter_atividade_por_id($query->inscricoesAtividadesId);
$queryEvento = $this->eventos_model->obter_evento_por_id($queryAtividade->atividadesEventosId);
?>

<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>"); ?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;Deseja realmente excluir esta inscrição?</h3>
            </div>
            <?php
            echo form_open("inscricoes/deletar/$inscricoesId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="inscricoesEventosNome">Nome</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <?php echo form_input(array('name' => 'inscricoesEventosNome', 'class' => 'form-control'), set_value('inscricoesEventosNome', $queryEvento->eventosNome), 'disabled'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inscricoesAtividadesNome">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-ban-circle"></span>
                            <?php echo form_input(array('name' => 'inscricoesAtividadesNome', 'class' => 'form-control'), set_value('inscricoesAtividadesNome', $queryAtividade->atividadesNome), 'disabled'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_hidden('inscricoesId', $query->inscricoesId); ?>
                        <?php echo form_submit(array('name' => 'excluir', 'class' => 'btn btn-primary'), 'Excluir'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
