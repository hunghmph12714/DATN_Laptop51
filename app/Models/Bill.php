<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = "bills";
    public $fillable = ['code', 'payment_method', 'total', 'user_id', 'payment_status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

