<?php
$this->load->view('includes/header');
$this->load->view('includes/menu');
if ($arquivo != '') {
    if($controllador != '') {
        $this->load->view($controllador."/".$arquivo);
    } else {
        $this->load->view($arquivo);
    }
}
$this->load->view('includes/footer');