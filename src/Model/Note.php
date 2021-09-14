<?php
namespace Louzada\NotePad\Model;

use Louzada\NotePad\Lib\Database\Connection;

class Note
// Model fica encarregada de conectar ao banco de dados e trazer os dados
{
    private $id;
    private $title;
    private $content;
    private $user_note;

    public static function selectAll(){
        $pdo = Connection::connectionDB();
        $stmt = $pdo->prepare('SELECT * FROM user;');
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    public function createNewNote(){
        $pdo = Connection::connectionDB();
        $sql = 'INSERT INTO notes (title,content,user_note) VALUES(?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$this->title);
        $stmt->bindValue(2,$this->content);
        $stmt->bindValue(3,$this->user_note);
        $stmt->execute();
    }
    public function deleteNote(){
        $pdo = Connection::connectionDB();
        $sql = 'DELETE FROM notes WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$this->getId());
        $stmt->execute();
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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getUserNote()
    {
        return $this->user_note;
    }

    /**
     * @param mixed $user_note
     */
    public function setUserNote($user_note): void
    {
        $this->user_note = $user_note;
    }




}