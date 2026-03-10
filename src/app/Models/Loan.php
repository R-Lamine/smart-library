<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    use HasFactory;

    /**
     * Les attributs qu'on peut remplir en masse
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'due_date',
        'returned_at',
        'status',
    ];

    /**
     * Conversion automatique de types
     */
    protected $casts = [
        'loan_date' => 'date',
        'due_date' => 'date',
        'returned_at' => 'date',
    ];

    /**
     * RELATIONS
     */

    // Un emprunt appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un emprunt concerne un livre
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * MÉTHODES UTILES
     */

    // Vérifier si l'emprunt est en retard
    public function isLate()
    {
        return $this->status === 'borrowed' 
            && $this->due_date < now();
    }

    // Calculer le nombre de jours de retard
    public function getDaysLate()
    {
        if (!$this->isLate()) {
            return 0;
        }

        return now()->diffInDays($this->due_date);
    }

    // Marquer comme retourné
    public function markAsReturned()
    {
        $this->update([
            'returned_at' => now(),
            'status' => 'returned',
        ]);

        // Augmenter le stock du livre
        $this->book->increaseStock();
    }

    // Vérifier si le retard dépasse 15 jours (pour bloquer le compte)
    public function shouldBlockUser()
    {
        return $this->getDaysLate() > 15;
    }

    /**
     * ÉVÉNEMENTS AUTOMATIQUES
     */

    protected static function booted()
    {
        // Quand un emprunt est créé, diminuer le stock
        static::created(function ($loan) {
            $loan->book->decreaseStock();
        });

        // Mettre à jour le statut en "late" automatiquement
        static::saving(function ($loan) {
            if ($loan->isLate()) {
                $loan->status = 'late';
            }
        });
    }
}