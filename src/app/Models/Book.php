<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Les attributs qu'on peut remplir en masse
     */
    protected $fillable = [
        'title',
        'isbn',
        'author_id',
        'category_id',
        'publication_year',
        'shelf_location',
        'summary_ai',
        'keywords_ai',
        'total_quantity',
        'available_quantity',
        'cover_image',
        'status',
    ];

    /**
     * RELATIONS
     */

    // Un livre appartient à un auteur
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Un livre appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un livre a plusieurs emprunts
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * MÉTHODES UTILES
     */

    // Vérifier si le livre est disponible
    public function isAvailable()
    {
        return $this->available_quantity > 0 && $this->status === 'available';
    }

    // Diminuer le stock (lors d'un emprunt)
    public function decreaseStock()
    {
        if ($this->available_quantity > 0) {
            $this->decrement('available_quantity');
        }
    }

    // Augmenter le stock (lors d'un retour)
    public function increaseStock()
    {
        if ($this->available_quantity < $this->total_quantity) {
            $this->increment('available_quantity');
        }
    }

    // Calculer le taux de rotation (combien de fois emprunté sur les 6 derniers mois)
    public function getRotationRate()
    {
        return $this->loans()
            ->where('loan_date', '>=', now()->subMonths(6))
            ->count();
    }
}