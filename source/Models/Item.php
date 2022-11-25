<?php

namespace Source\Models;

use Source\Core\Connect;

class Item {
    private $id;
    private $title;
    private $price;
    private $category;
    private $description;
    private $image;
    private $message;

    public function __construct(
        int $id = NULL,
        string $title = NULL,
        string $price = NULL,
        string $category = NULL,
        string $description = NULL,
        string $image = NULL
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->image = $image;
    }

    public function create(): bool {
        $query = "INSERT INTO items (title, price, category, description, image) VALUES (:title, :price, :category, :description, :image)";

        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->execute();

        $this->message = "Produto cadastrado com sucesso!";
        return true;
    }

    public function findAll() {
        $query = "SELECT * FROM items";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return NULL;
        }
        return $stmt->fetchAll();
    }

    public function findById(string $id): bool {
        $query = "SELECT * FROM items WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        }

        $item = $stmt->fetch();
        $this->title = $item->title;
        $this->price = $item->price;
        $this->category = $item->category;
        $this->description = $item->description;
        $this->image = $item->image;

        return true;
    }

    public function update(): bool {
        if ($this->findById($this->id)) {
            $query = "UPDATE items SET title = :title, price = :price, category = :category, description = :description, image = :image WHERE id = :id";
            $stmt = Connect::getInstance()->prepare($query);

            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":category", $this->category);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":image", $this->image);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();

            $this->message = "Item alterado com sucesso!";
            return true;
        }
        $this->message = "Item não encontrado!";
        return false;
    }

    public function delete(): bool {
        if ($this->findById($this->id)) {
            $query = "DELETE items WHERE id = :id";
            $stmt = Connect::getInstance()->prepare($query);

            $stmt->bindParam(":id", $this->id);
            $stmt->execute();

            $this->message = "Item deletado com sucesso!";
            return true;
        }
        $this->message = "Item não encontrado ou já deletado!";
        return false;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category): void {
        $this->category = $category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image): void {
        $this->image = $image;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message): void {
        $this->message = $message;
    }

}