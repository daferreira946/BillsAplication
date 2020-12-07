<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'type', 'description', 'value'
    ];
}
