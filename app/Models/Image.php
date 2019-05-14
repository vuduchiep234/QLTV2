<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'imageName', 'imageURL'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_images');
    }
}
