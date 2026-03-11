<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Créer des catégories
        $sf = Category::create(['name' => 'SF / Fantastique']);
        $classique = Category::create(['name' => 'Classique']);
        $histoire = Category::create(['name' => 'Histoire']);

        // Créer des auteurs
        $rothfuss = Author::create(['name' => 'Patrick Rothfuss']);
        $zola = Author::create(['name' => 'Émile Zola']);
        $harari = Author::create(['name' => 'Yuval Noah Harari']);

        // Créer des livres
        Book::create([
            'title' => 'Le Nom du Vent',
            'isbn' => '9782253000017',
            'author_id' => $rothfuss->id,
            'category_id' => $sf->id,
            'summary_ai' => "L'histoire suit Kvothe, un musicien et magicien de légende...",
        ]);

        Book::create([
            'title' => 'Germinal',
            'isbn' => '9782253000024',
            'author_id' => $zola->id,
            'category_id' => $classique->id,
            'available_quantity' => 0,
        ]);

        Book::create([
            'title' => 'Sapiens',
            'isbn' => '9782253000031',
            'author_id' => $harari->id,
            'category_id' => $histoire->id,
        ]);
    }
}