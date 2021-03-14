<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 */
class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path', 'name', 'whatsapp', 'email', 'latitude', 'longitude', 'city', 'uf', 'items'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'point_items');
    }
}
