<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['quantity'] - int - item quantity
     * $this->attributes['price'] - int - item price
     * $this->attributes['order_id'] - int - foreign key to orders
     * $this->attributes['service_id'] - int|null - foreign key to services
     * $this->attributes['plant_id'] - int|null - foreign key to plants
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = ['quantity', 'price', 'order_id', 'service_id', 'plant_id'];

    // Getters
    public function getId(): int { return $this->attributes['id']; }
    public function getQuantity(): int { return $this->attributes['quantity']; }
    public function getPrice(): int { return $this->attributes['price']; }
    public function getOrderId(): int { return $this->attributes['order_id']; }
    public function getServiceId(): ?int { return $this->attributes['service_id']; }
    public function getPlantId(): ?int { return $this->attributes['plant_id']; }
    public function getCreatedAt(): string { return $this->attributes['created_at']; }
    public function getUpdatedAt(): string { return $this->attributes['updated_at']; }

    // Setters (sin setId — acuerdo #18)
    public function setQuantity(int $quantity): void { $this->attributes['quantity'] = $quantity; }
    public function setPrice(int $price): void { $this->attributes['price'] = $price; }
    public function setOrderId(int $orderId): void { $this->attributes['order_id'] = $orderId; }
    public function setServiceId(?int $serviceId): void { $this->attributes['service_id'] = $serviceId; }
    public function setPlantId(?int $plantId): void { $this->attributes['plant_id'] = $plantId; }

    // Validación
    public static function validate($request): void
    {
        $request->validate([
            'quantity'   => 'required|integer',
            'price'      => 'required|integer',
            'order_id'   => 'required|integer',
            'service_id' => 'nullable|integer',
            'plant_id'   => 'nullable|integer',
        ]);
    }

    public function getFormattedDate(): string
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    // Relaciones
    public function getOrder()
    {
        return $this->belongsTo(Order::class)->first();
    }

    public function getPlant()
    {
        return $this->belongsTo(Plant::class)->first();
    }
}
