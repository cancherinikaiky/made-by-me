<?php

namespace Source\Models;

use Source\Core\Connect;

class Item
{
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

    /**
     * @return bool
     */
    public function insert() : bool
    {
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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

}