<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookHistory extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_copies_id', 'user_id', 'state',
    ];

    protected $attributes = [
        'state' => true,
    ];

    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class, 'book_copies_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
