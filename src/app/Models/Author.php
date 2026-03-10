<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Les attributs qu'on peut remplir en masse
     */
    protected $fillable = [
        'name',
    ];

    /**
     * RELATIONS
     */

    // Un auteur a plusieurs livres
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}