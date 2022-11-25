<?php

namespace Source\Models;

use Source\Core\Connect;

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $photo;
    private $message;

  public function __construct(
    int $id = NULL,
    string $username = NULL,
    string $email = NULL,
    string $password = NULL,
    string $photo = NULL
  )
  {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->photo = $photo;
  }

    public function create(): bool {
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindValue(":password", password_hash($this->password,PASSWORD_DEFAULT));
        $stmt->execute();
        $this->message = "Usuário cadastrado com sucesso!";
        return true;
    }

    public function findAll() {
        $query = "SELECT * FROM users";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return null;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findById(string $id): bool {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        }

        $user = $stmt->fetch();
        $this->username = $user->username;
        $this->email = $user->email;

        return true;
    }

    public function update(): void {
        $query = "UPDATE users SET username = :username, email = :email, photo = :photo WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":photo",$this->photo);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
  
        $arrayUser = [
          "id" => $this->id,
          "username" => $this->username,
          "email" => $this->email,
          "photo" => $this->photo
        ];
  
        $_SESSION["user"] = $arrayUser;
        $this->message = "Usuário alterado com sucesso!";
    }

    public function delete(): bool {
        if ($this->findById($this->id)) {
            $query = "DELETE users WHERE id = :id";
            $stmt = Connect::getInstance()->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->execute();

            $this->message = "Usuário deletado com sucesso!";
            return true;
        }

        $this->message = "Usuário não encontrado ou já deletado!";
        return false;
    }

    public function validate(string $email, string $password): bool {
        $query = "SELECT * FROM users WHERE email LIKE :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $this->message = "Usuário e/ou Senha não cadastrados!";
            return false;
        } else {
            $user = $stmt->fetch();
            if(!password_verify($password, $user->password)){
                $this->message = "Usuário e/ou Senha não cadastrados!";
                return false;
            }
        }

        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->message = "Usuário logado com sucesso! Seja bem-vindo, " . $this->username . ".";

        $arrayUser = [
          "id" => $this->id,
          "username" => $this->username,
          "email" => $this->email
        ];

        $_SESSION["user"] = $arrayUser;
        setcookie("user","Logado",time()+60*60,"/");

        return true;
    }

    public function emailExists(string $email): bool {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function getPhoto() {
      return $this->photo;
    }

    public function setPhoto($photo): void {
      $this->photo = $photo;
    }
  
      public function getMessage() {
          return $this->message;
      }
  
      public function getId(): ?int {
          return $this->id;
      }
  
      public function setId(?int $id): void {
          $this->id = $id;
      }
  
      public function getUsername(): ?string {
          return $this->username;
      }
  
      public function setUsername(?string $username): void {
          $this->username = $username;
      }
  
      public function getEmail(): ?string {
          return $this->email;
      }
  
      public function setEmail(?string $email): void {
          $this->email = $email;
      }
  
      public function getPassword(): ?string {
          return $this->password;
      }
  
      public function setPassword(?string $password): void {
          $this->password = $password;
      }
}