<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cPagina extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect ('principal');
        $this->load->helper('array');
        $this->load->model('mItem');
    }
    
    public function index() {
        $dados = array(
            'titulo' => 'Remember Redis',
            'tela' => 'pagina',
        );

        $this->load->view('sistema', $dados);
    }
    
    public function inserirTarefa() {
            $userId = $this->session->userdata('userId');            
            $dados = elements(array('tTitulo', 'tData', 'tHora', 'tDescricao'), $this->input->post());            
            $this->mItem->inserirTarefa($dados, $userId);
    }
    
    public function inserirAlarme() {
            $userId = $this->session->userdata('userId');            
            $dados = elements(array('aData', 'aHora'), $this->input->post());            
            $this->mItem->inserirTarefa($dados, $userId);
    }

}
