<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'vehicle_id',
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
