<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $table = 'user_links'; // Specifies the table name used by the model
    public $timestamps = false; // Disables automatic timestamps management by Eloquent

    // Specifies the fillable attributes that can be mass assigned
    protected $fillable = [
        'id',
        'short_link',
        'full_link'
    ];
}
