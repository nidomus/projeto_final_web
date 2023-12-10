<?php

class Projeto{

    public $id;
    public $nome;
    public $cargo;


    public function __set($id,$nome){
        $this->$nome = $nome;
        $this->$id = $id;
    }


    public function getNome(){
        return $this->$nome;
    }

    public function setNome($nome){

        $this->$nome = $nome;

    }

        public function __toString(){
        return json_encode($this);
    }


}

?>