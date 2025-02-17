<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_start',
        'date_end',
        'content',
        'monthly_price',
        'box_id',
        'tenant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function box()
    {
        return $this->belongsTo(Box::class, "box_id");
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, "tenant_id");
    }
}
