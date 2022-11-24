<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'postalcode',
        'payment_method',
        'payment_status',
        'payment_reference',
        'status',
        'message',
        'reference',
    ];

    public function products()
    {
        return $this->hasMany(OrderItem::class);
    }
}
