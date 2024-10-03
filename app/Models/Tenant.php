<?php

namespace App\Models;

use App\Models\Box;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surface',
        'price',
        'address',
        'description',
        'box_id'
    ];

    public function user()
    {
        return $this->belongsTo(Box::class, "box_id");
    }
}
