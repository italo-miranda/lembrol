<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include 'tarefa.php';
include 'alarme.php';
class mItem extends CI_Model {

    public function inserirTarefa($dados, $userId) {
        $titulo = $dados['tTitulo'];
        $data = $dados['tData'];
        $hora = $dados['tHora'];
        $descricao = $dados['tDescricao'];
        $tarefaId = $this->redis->client->incr("idTarefa");
        //grava o id do usuario e o id da tarefa numa lista pra pesquisar depois
        $this->redis->client->lpush("tarefasUser:$userId", $tarefaId);
        //grava os dados da tarefa numa hash
        $this->redis->client->hmset("tarefa:$tarefaId", "titulo", $titulo, "data", $data, "hora", $hora, "descricao", $descricao, "userId", $userId);
        redirect('cPagina');
    }
    
    public function inserirAlarme($dados, $userId) {
        $data = $dados['aData'];
        $hora = $dados['aHora'];
        $alarmeId = $this->redis->client->incr("idAlarme");
        //gravar o o ID da tarefa em uma hash para pesquisar depois
        $this->redis->client->hset("alarmes", $data, $alarmeId);
        //grava o id do usuario e o id da tarefa numa lista pra pesquisar depois
        $this->redis->client->lpush("alarmesUser:$userId", $alarmeId);
        //grava os dados da tarefa numa hash
        $this->redis->client->hmset("alarme:$alarmeId", "data", $data, "hora", $hora, "userId", $userId);
        redirect('cPagina');
    }
    
    public function pegarTodasTarefas($userId){
        $tamanho = $this->redis->client->llen("tarefasUser:$userId");
        $idTarefas = $this->redis->client->lrange("tarefasUser:$userId", 0, ($tamanho - 1));
        $tarefas = array();
        
        foreach ($idTarefas as $id) {
            $tarefas[] = $this->pegarTarefaPeloID($id);
        }
        return $tarefas;
    }
    
    public function pegarTarefaPeloID($tarefaId){
        $tarefa = new tarefa();
        $selecao = $this->redis->client->hgetall("tarefa:$tarefaId");
        $tarefa->titulo = $selecao['titulo'];
        $tarefa->descricao = $selecao['descricao'];
        $tarefa->data = $selecao['data'];
        $tarefa->hora = $selecao['hora'];
        $tarefa->tarefaId = $tarefaId;
        
        return $tarefa;
    }
    
    public function pegarTodosAlarmes($userId){
        $tamanho = $this->redis->client->llen("alarmesUser:$userId");
        $idAlarmes = $this->redis->client->lrange("alarmesUser:$userId", 0, ($tamanho - 1));
        $alarmes = array();
        
        foreach ($idAlarmes as $id) {
            $alarmes[] = $this->pegarAlarmePeloID($id);
        }
        return $alarmes;
    }
    
    public function pegarAlarmePeloID($alarmeId){
        $alarme = new alarme();
        $selecao = $this->redis->client->hgetall("alarme:$alarmeId");        
        $alarme->data = $selecao['data'];
        $alarme->hora = $selecao['hora'];
        
        return $alarme;
    }

    public function deletarTarefa($tarefaId, $userId){
                
        $this->redis->client->hdel("tarefa:$tarefaId", "titulo");
        $this->redis->client->hdel("tarefa:$tarefaId", "descricao");
        $this->redis->client->hdel("tarefa:$tarefaId", "data");
        $this->redis->client->hdel("tarefa:$tarefaId", "hora");
        $this->redis->client->hdel("tarefa:$tarefaId", "userId");
        
        $this->redis->client->lrem("tarefasUser:$userId",0,  $tarefaId);
        redirect('cPagina');
    }
    
    public function deletarAlarme($alarmeId, $userId){
        $this->redis->client->hdel("alarme:$alarmeId", "data");
        $this->redis->client->hdel("alarme:$alarmeId", "hora");
        $this->redis->client->hdel("alarme:$alarmeId", "userId");
        
        $this->redis->client->lrem("alarmesUser:$userId",0,  $alarmeId);
        redirect('cPagina');
    }
}
