<?php

$this->load->view('header');
if ($tela != 'index'):
   // $this->load->view('menu');
    $this->load->view($tela);
else :
    $this->load->view('index');
endif;

$this->load->view('footer');
