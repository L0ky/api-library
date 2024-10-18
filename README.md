## Installation

### 1. Cloner le dépôt
```
git clone https://github.com/L0ky/api-library.git
cd api-library
```

### 2. Installation des dépendances
```
composer install
```

### 3. Configuration du fichier .env
```
cp .env.example .env
```

### 4. Générer la clé de l'application
```
php artisan key:generate
```

### 5. Démarrer l'environnement Docker avec Sail
```
./vendor/bin/sail up -d
```

### 6. Migrer la base de données
```
./vendor/bin/sail artisan migrate
```

### 7. Accéder à l'application
```
http://localhost
```

### 8. Collection insomnia
Le fichier se trouve à la racine du projet
```
Insomnia_2024-10-18.json
```

