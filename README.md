# Biblio-IA : Gestion de bibliothèque avec IA locale

## Stack
- Laravel 11
- MySQL 8
- Ollama (LLM local)
- Tailwind CSS
- Docker

## Prérequis
- Docker Desktop installé
- WSL2 activé (Windows)
- Git

## Installation

### 1. Cloner le projet
```bash
git clone <url> bibliotheque-ai
cd bibliotheque-ai


// 2. Créer le projet Laravel
docker run --rm -v ${PWD}/src:/app -w /app composer create-project laravel/laravel .

// 3. Lancer les conteneurs Docker
docker-compose up -d --build


// 4. Pull du modèle TinyLlama pour Ollama
docker exec -it biblio-ollama ollama pull tinyllama


// 5. Tester le modèle avec Ollama
docker exec -it biblio-ollama ollama run tinyllama "Bonjour"

// 4. exemple de création d'une migration pour les prêts (optionnel ,déja fait)

docker exec -it biblio-app php artisan make:migration create_loans_table


// 4. Exécuter les migrations pour créer les tables dans la base de données   (optionnel ,déja fait)

docker exec -it biblio-app php artisan migrate


// 5. Installer les dépendances npm pour Tailwind CSS
docker exec -it biblio-app npm install

// 6. Lancer le serveur de développement Laravel (pas cella qui marche  a cause de Vite et du port 5173 qui pose problème avec Docker ,c'est ça ///qui marche 
docker exec -it biblio-app npm run dev
// ou pour construire les assets pour la production
//c'est ça qui marche 
docker exec -it biblio-app npm run build


// 7. (Optionnel) Créer un seeder pour ajouter des données de démonstration
docker exec -it biblio-app php artisan make:seeder DemoSeeder

// 8. Exécuter les migrations et les seeders pour remplir la base de données

docker exec -it biblio-app php artisan migrate:fresh --seed