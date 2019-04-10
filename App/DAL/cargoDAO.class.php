<?php  

class cargoDAO{
    private $conexao;
    private $pdo;
    
    public function __construct() {
        $this->conexao = new Conexao();
        $this->pdo = $this->conexao->conectar();
    }


    public function lista(){
        $sql = $this->pdo->prepare('SELECT * FROM cargos');
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deletar($id){
        $sql = $this->pdo->prepare('DELETE FROM cargos WHERE cargoID = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
		    $_SESSION['mensagem'] = 'Cargo deletado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao deletar cargo';
        }
    }

    public function Inserir($codigo, $cargo){
        $sql = $this->pdo->prepare('INSERT INTO cargos (codigo, cargo) VALUES (?,?)');
        $sql->bindValue(1, $codigo);
        $sql->bindValue(2, $cargo);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Cargo cadastrado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao cadastrar o cargo';
        }
    }

    public function Update($codigo, $cargo, $cargoID){
        $sql = $this->pdo->prepare('UPDATE cargos SET codigo = ?, cargo = ? WHERE cargoID = ?');
        $sql->bindValue(1, $codigo);
        $sql->bindValue(2, $cargo);
        $sql->bindValue(2, $cargoID);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Cargo atualizado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
            $_SESSION['mensagem'] = 'Falha ao atualizar o cargo';
        }
    }


}
