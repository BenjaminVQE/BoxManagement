<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surface',
        'price',
        'address',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
