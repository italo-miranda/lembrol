<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tarefa extends CI_Model {
    
    var $tarefaId = '';
    var $titulo = '';
    var $data = '';
    var $hora = '';
    var $descricao = null;
    var $userId = null;

    function __construct() {
        parent::__construct();
    }
}