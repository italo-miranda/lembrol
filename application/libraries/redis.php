<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once(APPPATH . 'libraries/predis/autoload.php');
Predis\Autoloader::register();

class Redis {

    var $client = null;

    function __construct() {
        if ($this->client == null) {
            $this->client = new Predis\Client(array(
                'scheme' => 'tcp',
                'host' => '127.0.0.1',
                'port' => 6379,
                'database'=>1,
            ));
        }
    }

}
