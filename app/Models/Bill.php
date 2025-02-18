<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;


    protected $fillable = [
        'payment_total',
        'payment_date',
        'period_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, "contract_id");
    }
}
