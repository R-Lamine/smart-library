<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qu'on peut remplir en masse
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role',
        'is_blocked',
    ];

    /**
     * Les attributs cachés (sécurité)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion automatique de types
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_blocked' => 'boolean',
        ];
    }

    /**
     * RELATIONS
     */

    // Un utilisateur a plusieurs emprunts
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * MÉTHODES UTILES
     */

    // Vérifier si l'utilisateur est bibliothécaire
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Vérifier si l'utilisateur est adhérent
    public function isMember()
    {
        return $this->role === 'member';
    }

    // Bloquer un adhérent
    public function block()
    {
        $this->update(['is_blocked' => true]);
    }

    // Débloquer un adhérent
    public function unblock()
    {
        $this->update(['is_blocked' => false]);
    }

    // Obtenir le nom complet
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}