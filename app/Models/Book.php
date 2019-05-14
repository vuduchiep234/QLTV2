<?php

namespace App\Models;

use App\BookQuantity;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'publisher_id', 'publishedYear'
    ];


    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function bookCopies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'book_images');
    }

    public function bookQuantity()
    {
        return $this->hasOne(BookQuantity::class);
    }
}
