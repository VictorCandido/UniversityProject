<?php  

class clienteDAO{
    private $conexao;
    private $pdo;
    
    public function __construct() {
        $this->conexao = new Conexao();
        $this->pdo = $this->conexao->conectar();
    }


    public function lista(){
        $sql = $this->pdo->prepare('SELECT * FROM cliente');
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deletar($id){
        $sql = $this->pdo->prepare('DELETE FROM cliente WHERE clienteID = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
		    $_SESSION['mensagem'] = 'Cliente deletado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao deletar cliente';
        }
    }

    public function Inserir($nome, $cpf, $email, $operadoraID){
        $sql = $this->pdo->prepare('INSERT INTO cliente (clienteNome, clienteCPF, clienteEmail, clienteOperadoraID) VALUES (?,?,?,?)');
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cpf);
        $sql->bindValue(3, $email);
        $sql->bindValue(4, $operadoraID);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Cliente cadastrado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao cadastrar o cliente';
        }
    }

    public function Update($nome, $cpf, $email, $operadoraID, $clienteID){
        $sql = $this->pdo->prepare('UPDATE cliente SET clienteNome = ?, clienteCPF = ?, clienteEmail = ?, clienteOperadoraID = ? WHERE clienteID = ?');
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cpf);
        $sql->bindValue(3, $email);
        $sql->bindValue(4, $operadoraID);
        $sql->bindValue(5, $clienteID);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Cliente atualizado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
            $_SESSION['mensagem'] = 'Falha ao atualizar o cliente';
        }
    }

    public function pesquisa($id){
        $sql = $this->pdo->prepare('SELECT * FROM cliente WHERE clienteID = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function listaOperadora(){
        $sql = $this->pdo->prepare('SELECT * FROM operadora');
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
