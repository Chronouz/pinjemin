<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    
    protected $fillable = [
        'image_path',
        'name',
        'description',
        'cost',
        'location',
        'category',
        'stock',
        'condition',
        'link',
    ];
}
