<?php
class materia {
    private $Codigo;
    private $Nome;
    private $Professores;
    private $Alunos;
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getNome() {
        return $this->Nome;
    }

    function getProfessores() {
        return $this->Professores;
    }

    function getAlunos() {
        return $this->Alunos;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setProfessores($Professores) {
        $this->Professores = $Professores;
    }

    function setAlunos($Alunos) {
        $this->Alunos = $Alunos;
    }


}
