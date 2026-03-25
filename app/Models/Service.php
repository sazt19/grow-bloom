<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Service extends Model
{
    /**
     * SERVICE ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['employee'] - string - employee name
     * $this->attributes['description'] - string - service description
     * $this->attributes['price'] - int - service price
     * $this->attributes['duration'] - string - service duration
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = [
        'employee',
        'description',
        'price',
        'duration',
    ];

    // Getters
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getEmployee(): string
    {
        return $this->attributes['employee'];
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function getDuration(): string
    {
        return $this->attributes['duration'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    // Setters 
    public function setEmployee(string $employee): void
    {
        $this->attributes['employee'] = $employee;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function setDuration(string $duration): void
    {
        $this->attributes['duration'] = $duration;
    }

    // Validation method
    public static function validate(Request $request): void
    {
        $request->validate([
            'employee'    => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|integer|min:0',
            'duration'    => 'required|string',
        ]);
    }
}