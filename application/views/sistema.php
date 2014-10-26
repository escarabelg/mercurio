<?php

if ($arquivo != "login" && $controllador . "/" . $arquivo != "usuarios/inserir") {
    $this->load->view('includes/header');
    if ($arquivo != '') {
        if ($controllador != '') {
            $this->load->view($controllador . "/" . $arquivo);
        } else {
            $this->load->view($arquivo);
        }
    }
    $this->load->view('includes/footer');
} else {
    if ($arquivo != '') {
        if ($controllador != '') {
            $this->load->view($controllador . "/" . $arquivo);
        } else {
            $this->load->view($arquivo);
        }
    }
}