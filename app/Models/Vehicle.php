<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'manufacturer', 'year',
    ];

    public function parts()
    {
        return $this->hasMany(Parts::class);
    }
}
