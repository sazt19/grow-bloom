<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * PAYMENT ATTRIBUTES
     * $this->attributes['id'] - int - primary key
     * $this->attributes['payment_date'] - date - payment date
     * $this->attributes['amount'] - int - payment amount
     * $this->attributes['payment_method'] - string - payment method
     * $this->attributes['payment_status'] - string - payment status
     * $this->attributes['receipt_image'] - string - receipt image
     * $this->attributes['verification_date'] - date|null - verification date
     * $this->attributes['order_id'] - int - foreign key to orders
     * $this->attributes['created_at'] - timestamp
     * $this->attributes['updated_at'] - timestamp
     */

    protected $fillable = [
        'payment_date', 'amount', 'payment_method',
        'payment_status', 'receipt_image', 'verification_date', 'order_id'
    ];

    // Getters
    public function getId(): int { return $this->attributes['id']; }
    public function getPaymentDate(): string { return $this->attributes['payment_date']; }
    public function getAmount(): int { return $this->attributes['amount']; }
    public function getPaymentMethod(): string { return $this->attributes['payment_method']; }
    public function getPaymentStatus(): string { return $this->attributes['payment_status']; }
    public function getReceiptImage(): string { return $this->attributes['receipt_image']; }
    public function getVerificationDate(): ?string { return $this->attributes['verification_date']; }
    public function getOrderId(): int { return $this->attributes['order_id']; }
    public function getCreatedAt(): string { return $this->attributes['created_at']; }
    public function getUpdatedAt(): string { return $this->attributes['updated_at']; }

    // Setters (sin setId — acuerdo #18)
    public function setPaymentDate(string $paymentDate): void { $this->attributes['payment_date'] = $paymentDate; }
    public function setAmount(int $amount): void { $this->attributes['amount'] = $amount; }
    public function setPaymentMethod(string $paymentMethod): void { $this->attributes['payment_method'] = $paymentMethod; }
    public function setPaymentStatus(string $paymentStatus): void { $this->attributes['payment_status'] = $paymentStatus; }
    public function setReceiptImage(string $receiptImage): void { $this->attributes['receipt_image'] = $receiptImage; }
    public function setVerificationDate(?string $verificationDate): void { $this->attributes['verification_date'] = $verificationDate; }
    public function setOrderId(int $orderId): void { $this->attributes['order_id'] = $orderId; }

    // Validación
    public static function validate($request): void
    {
        $request->validate([
            'payment_date'      => 'required|date',
            'amount'            => 'required|integer',
            'payment_method'    => 'required|string',
            'payment_status'    => 'required|string',
            'receipt_image'     => 'required|string',
            'verification_date' => 'nullable|date',
            'order_id'          => 'required|integer',
        ]);
    }

    public function getFormattedDate(): string
    {
        return date('d/m/Y', strtotime($this->attributes['payment_date']));
    }

    // Relación
    public function getOrder()
    {
        return $this->belongsTo(Order::class)->first();
    }
}
