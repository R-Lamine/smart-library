 <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiLog extends Model
{
    use HasFactory;

    /**
     * Les attributs qu'on peut remplir en masse
     */
    protected $fillable = [
        'type',
        'prompt',
        'response_json',
    ];

    /**
     * Conversion automatique de types
     */
    protected $casts = [
        'response_json' => 'array',
    ];

    /**
     * MÉTHODES UTILES
     */

    // Enregistrer un appel IA
    public static function logAiCall($type, $prompt, $response)
    {
        return self::create([
            'type' => $type,
            'prompt' => $prompt,
            'response_json' => $response,
        ]);
    }
}