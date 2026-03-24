<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price',
        'caution',
        'description',
        'image',
    ];

    public function getId(): int
    {
        return $this->attributes['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getCaution(): ?string
    {
        return $this->attributes['caution'];
    }

    public function setCaution(?string $caution): void
    {
        $this->attributes['caution'] = $caution;
    }

    public function getDescription(): ?string
    {
        return $this->attributes['description'];
    }

    public function setDescription(?string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): ?string
    {
        return $this->attributes['image'];
    }

    public function setImage(?string $image): void
    {
        $this->attributes['image'] = $image;
    }
}