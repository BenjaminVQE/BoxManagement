<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dateStart',
        'dateEnd',
        'content',
        'monthlyPrice',
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
