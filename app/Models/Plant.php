<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
{
    use HasFactory;

    /**
     * PLANT ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['name'] - string - plant name
     * $this->attributes['type'] - string - plant type
     * $this->attributes['price'] - int - plant price
     * $this->attributes['caution'] - string - plant caution
     * $this->attributes['description'] - string - plant description
     * $this->attributes['image'] - string - plant image
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = [
        'name', 'type', 'price', 'caution', 'description', 'image'
    ];

    // Getters
    public function getId(): int { return $this->attributes['id']; }
    public function getName(): string { return $this->attributes['name']; }
    public function getType(): string { return $this->attributes['type']; }
    public function getPrice(): int { return $this->attributes['price']; }
    public function getCaution(): string { return $this->attributes['caution']; }
    public function getDescription(): string { return $this->attributes['description']; }
    public function getImage(): string { return $this->attributes['image']; }
    public function getCreatedAt(): string { return $this->attributes['created_at']; }
    public function getUpdatedAt(): string { return $this->attributes['updated_at']; }

    // Setters (sin setId — acuerdo #18)
    public function setName(string $name): void { $this->attributes['name'] = $name; }
    public function setType(string $type): void { $this->attributes['type'] = $type; }
    public function setPrice(int $price): void { $this->attributes['price'] = $price; }
    public function setCaution(string $caution): void { $this->attributes['caution'] = $caution; }
    public function setDescription(string $description): void { $this->attributes['description'] = $description; }
    public function setImage(string $image): void { $this->attributes['image'] = $image; }

    // Validación
    public static function validate($request): void
    {
        $request->validate([
            'name'        => 'required|string',
            'type'        => 'required|string',
            'price'       => 'required|integer',
            'caution'     => 'required|string',
            'description' => 'required|string',
            'image'       => 'required|string',
        ]);
    }

    public function getFormattedDate(): string
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }
}