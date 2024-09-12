<?php

namespace App\DTOs;

use DateTime;

class ArticleDTO {
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updated_at;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deleted_at;
    }

    public function __construct(
        private ?int $id,
        private string $name,
        private string $description,
        private int $quantity,
        private float $price,
        private ?int $user_id,
        private ?DateTime $created_at,
        private ?DateTime $updated_at,
        private ?DateTime $deleted_at
    ){}
    
    public static function get
    (
        ?int $id,
        string $name,
        string $description,
        int $quantity,
        int $price,
        ?int $user_id,
        ?DateTime $created_at,
        ?DateTime $updated_at,
        ?DateTime $deleted_at
    )
    {
        $model = new self(
            $id,
            $name,
            $description,
            $quantity,
            $price,
            $user_id,
            $created_at,
            $updated_at,
            $deleted_at
        );
        return $model;
    }


}