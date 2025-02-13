<?php

namespace App\Models;

use App\Models\Box;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastName',
        'firstName',
        'phoneNumber',
        'email',
        'address',
        'bankingDetails',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function boxes()
    {
        return $this->hasMany(Box::class, 'tenant_id');
    }
}
