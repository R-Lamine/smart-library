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