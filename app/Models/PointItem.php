<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($pointItems)
 */
class PointItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_id',
        'item_id'
    ];
}
