<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genreType',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
