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
        $userId = $this->session->userdata('userId');
        $dados = array(
            'titulo' => 'Remember Redis',
            'tela' => 'pagina',
            'tarefas' => $this->mItem->pegarTodasTarefas($userId),
            'alarmes' => $this->mItem->pegarTodosAlarmes($userId),
        );

        $this->load->view('sistema', $dados);
    }
    
    public function novaTarefa() {
        $dados = array(
            'titulo' => 'Remember Redis',
            'tela' => 'novaTarefa',
        );

        $this->load->view('sistema', $dados);
    }
    
    public function novoAlarme() {
        $dados = array(
            'titulo' => 'Remember Redis',
            'tela' => 'novoAlarme',
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
            $this->mItem->inserirAlarme($dados, $userId);
    }
    
    public function deletarTarefa(){
        $id = $this->uri->segment(3);
        $userId = $this->session->userdata('userId');
        $this->mItem->deletarTarefa($id, $userId);
    }
    
    public function deletarAlarme(){
        $id = $this->uri->segment(3);
        $userId = $this->session->userdata('userId');
        $this->mItem->deletarAlarme($id, $userId);
    }

}
