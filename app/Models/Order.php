<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['quantity'] - int - order quantity
     * $this->attributes['subtotal'] - int - order subtotal
     * $this->attributes['item_type'] - string - order item type
     * $this->attributes['user_id'] - int - foreign key to users
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = ['quantity', 'subtotal', 'item_type', 'user_id'];

    // Getters
    public function getId(): int { return $this->attributes['id']; }
    public function getQuantity(): int { return $this->attributes['quantity']; }
    public function getSubtotal(): int { return $this->attributes['subtotal']; }
    public function getItemType(): string { return $this->attributes['item_type']; }
    public function getUserId(): int { return $this->attributes['user_id']; }
    public function getCreatedAt(): string { return $this->attributes['created_at']; }
    public function getUpdatedAt(): string { return $this->attributes['updated_at']; }

    // Setters (sin setId — acuerdo #18)
    public function setQuantity(int $quantity): void { $this->attributes['quantity'] = $quantity; }
    public function setSubtotal(int $subtotal): void { $this->attributes['subtotal'] = $subtotal; }
    public function setItemType(string $itemType): void { $this->attributes['item_type'] = $itemType; }
    public function setUserId(int $userId): void { $this->attributes['user_id'] = $userId; }

    // Validación
    public static function validate($request): void
    {
        $request->validate([
            'quantity'  => 'required|integer',
            'subtotal'  => 'required|integer',
            'item_type' => 'required|string',
            'user_id'   => 'required|integer',
        ]);
    }

    public function getFormattedDate(): string
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    // Relaciones
    public function getUser()
    {
        return $this->belongsTo(User::class)->first();
    }

    public function getItems()
    {
        return $this->hasMany(Item::class)->get();
    }

    public function getPayment()
    {
        return $this->hasOne(Payment::class)->first();
    }
}
