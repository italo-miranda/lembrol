<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mItem extends CI_Model {

    public function inserirTarefa($dados, $userId) {
        $titulo = $dados['tTitulo'];
        $data = $dados['tData'];
        $hora = $dados['tHora'];
        $descricao = $dados['tDescricao'];
        $tarefaId = $this->redis->client->incr("idTarefa");
        //gravar o titulo da tarefa em uma hash para pesquisar depois
        $this->redis->client->hset("tarefas", $titulo, $tarefaId);
        //grava o id do usuario e o id da tarefa numa lista pra pesquisar depois
        $this->redis->client->lpush("userTarefa:$userId", $tarefaId);
        //grava os dados da tarefa numa hash
        $this->redis->client->hmset("tarefa:$tarefaId", "titulo", $titulo, "data", $data, "hora", $hora, "descricao", $descricao, "userId", $userId);
        redirect('pagina.php');
    }
    
    public function inserirAlarme($dados, $userId) {
        $data = $dados['aData'];
        $hora = $dados['aHora'];
        $alarmeId = $this->redis->client->incr("idAlarme");
        //gravar o o ID da tarefa em uma hash para pesquisar depois
        $this->redis->client->hset("tarefas", $data, $alarmeId);
        //grava o id do usuario e o id da tarefa numa lista pra pesquisar depois
        $this->redis->client->lpush("userTarefa:$userId", $alarmeId);
        //grava os dados da tarefa numa hash
        $this->redis->client->hmset("tarefa:$alarmeId", "data", $data, "hora", $hora, "userId", $userId);
        redirect('pagina.php');
    }

}
