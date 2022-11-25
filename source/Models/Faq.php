<?php

namespace Source\Models;

use Source\Core\Connect;

class Faq {

    private $id;
    private $question;
    private $answer;
    private $message;

    public function __construct(
        $id = NULL,
        $question = NULL, 
        $answer = NULL,
        $message = NULL,
    ){
        $this->id = $id;
        $this->question = $question;
        $this->answer = $answer;
        $this->message = $message;
    }

    public function create(): bool {
        $query = "INSERT INTO faqs (question, answer) VALUES (:question, :answer)";
        $stmt = Connect::getInstance()->prepare($query);

        $stmt->bindParam(":question", $this->question);
        $stmt->bindParam(":answer", $this->answer);
        $stmt->execute();

        $this->message = "Faq criado com sucesso!";
        return true;
    }

    public function findAll() {
        $query = "SELECT * FROM faqs";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return NULL;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findById(string $id): bool {
        $query = "SELECT * FROM faqs WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        }

        $faq = $stmt->fetch();
        $this->question = $faq->question;
        $this->answer = $faq->answer;

        return true;
    }

    public function update() {
        if ($this->findById($this->id)) {
            $query = "UPDATE faqs SET question = :question, answer = :answer WHERE id = :id";
            $stmt = Connect::getInstance()->prepare($query);

            $stmt->bindParam(":question", $this->question);
            $stmt->bindParam(":answer", $this->answer);
            $stmt->execute();

            $this->message = "Faq alterado com sucesso!";
            return true;
        }
        $this->message = "Faq não encontrado!";
        return false;
    }

    public function delete() {
        if ($this->findById($this->id)) {
            $query = "DELETE faqs WHERE id = :id";
            $stmt = Connect::getInstance()->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->execute();

            $this->message = "Faq deletado com sucesso!";
            return true;
        }
        $this->message = "Faq não encontrado ou já deletado!";
        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }
    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion($question): void {
        $this->question = $question;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer): void {
        $this->answer = $answer;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message): void {
        $this->message = $message;
    }
}