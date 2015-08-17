<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class alarme extends CI_Model {
    
    var $alarmeId = null;
    var $data = '';
    var $hora = '';
    var $userId = null;

    function __construct() {
        parent::__construct();
    }
}
