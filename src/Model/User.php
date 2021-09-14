<?php


namespace Louzada\NotePad\Model;


use Louzada\NotePad\Lib\Database\Connection;

class User
{
    private $id;
    private $nome;
    private $email;
    private $password;


    public function doLogin()
    {
        $pdo = Connection::connectionDB();
        $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch();


       //if (count($result) > 0) {
            if ($result['password'] === $this->password) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $this->email;
                $_SESSION['name'] = $result['nome'];
                return true;
            }
        //}
            throw new \Exception('Login Inválidoo');
    }

    public function createUser()
    {
        $pdo = Connection::connectionDB();
        $stmt = $pdo->prepare('INSERT INTO user (email,password,nome) VALUES(?,?,?)');
        $stmt->bindValue(1,$this->email);
        $stmt->bindValue(2,$this->password);
        $stmt->bindValue(3,$this->nome);
        if($stmt->execute()){
            return true;
        }
        throw new \Exception('Não foi possível realizar o cadastro');
    }
    public function searchNotesUser():array
    {
        $pdo = Connection::connectionDB();
        $sql = 'SELECT *FROM notes WHERE user_note = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$this->id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}