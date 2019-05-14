<?php

namespace App;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class BookQuantity extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'quantity'
    ];

    protected $attributes = [
        'quantity' => 0
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
