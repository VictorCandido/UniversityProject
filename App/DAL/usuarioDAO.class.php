<?php
session_start();
class usuarioDAO {
    private $conexao;
    private $pdo;
    
    public function __construct() {
        $this->conexao = new Conexao();
        $this->pdo = $this->conexao->conectar();
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
    public function verificaLogin(){
        if (!$_SESSION['usuario']) {
            header('Location: ../../../index.php');
            exit();
        }
    }
    
    public function login($usuario, $senha){
        try{
            $sql_usuario = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
            $sql_usuario->bindValue(1, $usuario);
            $sql_usuario->bindValue(2, $senha);
            $sql_usuario->execute();
            if($sql_usuario->rowCount() > 0){
                $result = $sql_usuario->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuario'] = $result['usuario'];
                return true;
            }else{
                $sql_email = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
                $sql_email->bindValue(1, $usuario);
                $sql_email->bindValue(2, $senha);
                $sql_email->execute();
                if($sql_email->rowCount() > 0){
                    $result = $sql_email->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['usuario'] = $result['usuario'];
                    return true;
                }else{
                    return false;
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    
    public function pesquisa($tipo, $valor){
        try{
            switch ($tipo) {
                case 'id':
                    $sql_id = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuarioID = ?");
                    $sql_id->bindValue(1, $valor);
                    $sql_id->execute();
                    $result = $sql_id->fetch(PDO::FETCH_ASSOC);
                    return $result;
                    break;
                
                case 'usuario':
                    $sql_usuario = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
                    $sql_usuario->bindValue(1, $valor);
                    $sql_usuario->execute();
                    $result = $sql_usuario->fetch(PDO::FETCH_ASSOC);
                    return $result;
                    break;
    
                case 'email':
                    $sql_email = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
                    $sql_email->bindValue(1, $valor);
                    $sql_email->execute();
                    $result = $sql_email->fetch(PDO::FETCH_ASSOC);
                    return $result;
                    break;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function lista(){
        $sql = $this->pdo->prepare('SELECT * FROM usuarios');
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deletar($id){
        $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE usuarioID = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
		    $_SESSION['mensagem'] = 'Usuário deletado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao deletar usuário';
        }
    }

    public function Inserir($nome, $cpf, $nascimento, $email, $usuario, $senha){
        $sql = $this->pdo->prepare('INSERT INTO usuarios (nome, cpf, nascimento, email, usuario, senha) VALUES (?,?,?,?,?,?)');
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cpf);
        $sql->bindValue(3, $nascimento);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $usuario);
        $sql->bindValue(6, $senha);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
		    $_SESSION['mensagem'] = 'Falha ao cadastrar o usuário';
        }
    }

    public function Update($nome, $cpf, $nascimento, $email, $usuario, $senha, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $uf, $id){
        $sql = $this->pdo->prepare('UPDATE usuarios SET nome = ?, cpf = ?, nascimento = ?, email = ?, usuario = ?, senha = ?, cep = ?, logradouro = ?, numero = ?, bairro = ?, complemento = ?, cidade = ?, uf = ? WHERE usuarioID = ?');
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cpf);
        $sql->bindValue(3, $nascimento);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $usuario);
        $sql->bindValue(6, $senha);
        $sql->bindValue(7, $cep);
        $sql->bindValue(8, $logradouro);
        $sql->bindValue(9, $numero);
        $sql->bindValue(10, $bairro);
        $sql->bindValue(11, $complemento);
        $sql->bindValue(12, $cidade);
        $sql->bindValue(13, $uf);
        $sql->bindValue(14, $id);
        $sql->execute();
        if($sql->rowCount() >0){
            $_SESSION['return'] = 'true';
            $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
        }else{
            $_SESSION['return'] = 'false';
            $_SESSION['mensagem'] = 'Falha ao atualizar o usuário';
        }
    }
}
