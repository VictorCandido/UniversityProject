<?php
class usuario {
    private $Nome;
    private $Cpf;
    private $DataNascimento;
    private $Email;
    private $NomeUsuario;
    private $Senha;
    
    function getNome() {
        return $this->Nome;
    }

    function getCpf() {
        return $this->Cpf;
    }

    function getDataNascimento() {
        return $this->DataNascimento;
    }

    function getEmail() {
        return $this->Email;
    }

    function getNomeUsuario() {
        return $this->NomeUsuario;
    }

    function getSenha() {
        return $this->Senha;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setCpf($Cpf) {
        $this->Cpf = $Cpf;
    }

    function setDataNascimento($DataNascimento) {
        $this->DataNascimento = $DataNascimento;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setNomeUsuario($NomeUsuario) {
        $this->NomeUsuario = $NomeUsuario;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }


}
