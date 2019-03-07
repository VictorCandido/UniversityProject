<?php
class cargo {
    private $Codigo;
    private $Cargo;
    
    function getCodigo() {
        return $this->Codigo;
    }

    function getCargo() {
        return $this->Cargo;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setCargo($Cargo) {
        $this->Cargo = $Cargo;
    }


}
