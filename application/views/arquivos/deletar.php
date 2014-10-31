<?php 
$arquivosId = $this->uri->segment(3);
if($arquivosId == null) {
    redirect('arquivos/listar');
} 
$query = $this->arquivos_model->obter_arquivo_por_id($arquivosId);
?>

<div class="container">
    <div class="col-md-8 col-lg-8 col-xs-12">
        <div class="panel panel-default panel-body">
            <?php echo validation_errors("<div class = 'alert alert-danger alert-dismissable'>" . "<i class = 'fa fa-ban'></i>" . "<button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;" . "</button>" . "<b>Erro! </b>" . $this->session->flashdata('retrieve-action'), "</div>");?>
            <div class="panel-heading bg-gray">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp; Deseja realmente excluir este artigo?</h3>
            </div>
            <?php
            echo form_open("arquivos/deletar/$arquivosId", array('class' => 'form-horizontal col-lg-12'));
            ?>
            <div class="body">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label" for="arquivosTitulo">Nome</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'arquivosTitulo', 'class' => 'form-control'), set_value('arquivosTitulo', $query->arquivosTitulo),'disabled'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="arquivosStatus">Nome</label>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-info-sign"></span>
                        <?php echo form_input(array('name' => 'arquivosStatus', 'class' => 'form-control'), set_value('arquivosStatus', $query->arquivosStatus),'disabled');
 ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('arquivosId', $query->arquivosId); ?>
                        <?php echo form_submit(array('name' => 'excluir', 'class' => 'btn btn-primary'), 'Excluir'); ?>

                        <?php echo form_close(); ?>
                    </div>
                </fieldset>
            </div>
            </form>
        </div>
    </div>
</div>
