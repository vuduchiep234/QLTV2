<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'state', 'state_detail', 'title',
    ];

    protected $attributes = [
        'state' => true,
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function bookHistories()
    {
        return $this->hasMany(BookHistory::class);
    }

}
