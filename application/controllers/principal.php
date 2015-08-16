<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class principal extends CI_Controller {

    public function __construct() {
        parent::__construct();                  
        $this->load->model('mUsuario');
        $this->load->library('form_validation');
 
    }

    public function index() {
        $dados = array(
            'titulo' => 'Remember Redis',
            'tela' => 'index',
        );
        
        $this->load->view('sistema', $dados);
    }
    
    public function cadastrarUsuario() {
 
            $dados = elements(array('cLogin', 'cSenha1'), $this->input->post()); 
            $this->mUsuario->cadastrarUsuario($dados);
        
    }
    
    public function fazerLogin(){
        $dados = elements(array('login', 'senha'), $this->input->post());
        $loginID = $this->mUsuario->fazerLogin($dados); 
        if($loginID == FALSE):
            redirect('index.php');
        else:            
            $this->session->set_userdata(array(
                    'login' => $loginID['login'],
                    'userId' => $loginID['userId'],
                    'logged_in' => TRUE,
                ));
                redirect('cPagina');
        
        endif;
    }
    
     public function fazerLogoff() {

        $this->session->sess_destroy();
        redirect('principal');
    }

}
