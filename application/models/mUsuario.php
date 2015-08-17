<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mUsuario extends CI_Model {

    public function cadastrarUsuario($dados) {
        $login = $dados['cLogin'];
        $senha = $dados['cSenha1'];
        $userId = $this->redis->client->incr("idUsuario");
        //gravar o login do usuario em uma hash para pesquisar depois
        $this->redis->client->hset("usuarios", $login, $userId);
        //grava os dados do usuario numa hash
        $this->redis->client->hmset("user:$userId", "login", $login, "senha", $senha);
        redirect('principal');
    }

    public function deletarUsuarioPeloLogin($login) {
        $id = $this->getIdByNome($login);
    }

    public function getIdByLogin($login) {
        $retorno = $this->redis->client->hget("usuarios", $login);
        return $retorno;
    }
    
    public function verificarSenha($senha, $userId){
        if($this->redis->client->hget("user:$userId", "senha") == $senha):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function fazerLogin($dados) {
        $login = $dados['login'];
        $senha = $dados['senha'];
        $userId = '';
        if ($this->getIdByLogin($login) == ''):
            return FALSE;                       
        else:
            $userId = $this->getIdByLogin($login);
            if ($this->verificarSenha($senha, $userId)== TRUE):
                return (array("login"=>$login, "userId"=> $userId));
            else:
                return FALSE;
            endif;            
        endif;
    }

}
