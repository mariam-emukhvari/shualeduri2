<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'product_name',
        'product_price',
        'product_description',
        'image'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
