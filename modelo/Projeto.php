<?php

class Projeto{

    public $id;
    public $nome;
    public $resumo;
    public $cargo;
    public $membros;


    public function __set($id,$nome){
        $this->nome = $nome;
        $this->id = $id;
    }


    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){

        $this->nome = $nome;

    }


    public function getResumo(){
        return $this->resumo;
    }

    public function setResumo($resumo){

        $this->resumo = resumo;

    }

        public function __toString(){
        return json_encode($this);
    }


}

?>