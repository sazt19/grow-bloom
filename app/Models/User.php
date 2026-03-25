<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['name'] - string - user name
     * $this->attributes['email'] - string - user email
     * $this->attributes['password'] - string - user password
     * $this->attributes['phone'] - string - user phone
     * $this->attributes['address'] - string - user address
     * $this->attributes['role'] - string - user role (user, admin)
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Getters
    public function getId(): int { return $this->attributes['id']; }
    public function getName(): string { return $this->attributes['name']; }
    public function getEmail(): string { return $this->attributes['email']; }
    public function getPhone(): ?string { return $this->attributes['phone'] ?? null; }
    public function getAddress(): ?string { return $this->attributes['address'] ?? null; }
    public function getRole(): string { return $this->attributes['role']; }
    public function getCreatedAt(): string { return $this->attributes['created_at']; }
    public function getUpdatedAt(): string { return $this->attributes['updated_at']; }

    // Setters (sin setId — acuerdo #18)
    public function setName(string $name): void { $this->attributes['name'] = $name; }
    public function setEmail(string $email): void { $this->attributes['email'] = $email; }
    public function setPhone(?string $phone): void { $this->attributes['phone'] = $phone; }
    public function setAddress(?string $address): void { $this->attributes['address'] = $address; }
    public function setRole(string $role): void { $this->attributes['role'] = $role; }

    // Helpers
    public function isAdmin(): bool { return $this->attributes['role'] === 'admin'; }

    // Relaciones
    public function getOrders()
    {
        return $this->hasMany(Order::class)->get();
    }
}