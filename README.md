## Prérequis

Docker installé et fonctionnel (car Laravel Sail utilise Docker).
Composer installé pour gérer les dépendances PHP.
Une copie du dépôt du projet (via git clone ou autre méthode).
## Installation
Suivez ces étapes pour installer et configurer le projet sur votre machine locale :

1. Cloner le dépôt
Si vous n'avez pas encore cloné le projet, faites-le en utilisant la commande suivante :

```
git clone https://github.com/votre-utilisateur/votre-projet.git
cd votre-projet
```
1. Installation des dépendances
Installez les dépendances PHP du projet à l'aide de Composer :

```
composer install
```
1. Configuration du fichier .env
Dupliquez le fichier .env.example pour créer un fichier .env dans le répertoire racine du projet :

```
cp .env.example .env
```
Modifiez les paramètres du fichier .env si nécessaire (notamment les variables de configuration de la base de données, si vous ne souhaitez pas utiliser les valeurs par défaut).

1. Générer la clé de l'application
Générez une clé unique pour l'application Laravel :

```
php artisan key:generate
```

1. Démarrer l'environnement Docker avec Sail
Laravel Sail vous permet de démarrer les services nécessaires via Docker. Utilisez la commande suivante pour démarrer le conteneur :

./vendor/bin/sail up -d

1. Migrer la base de données
Si vous utilisez une base de données, exécutez les migrations pour créer les tables nécessaires :
```
./vendor/bin/sail artisan migrate
```
1. Accéder à l'application
Votre application Laravel devrait maintenant être accessible à l'adresse suivante dans votre navigateur :
```
http://localhost
```

