# Backend - Portfolio Mr Euloge

## Configuration de la base de données

### Étape 1 : Créer la base de données dans phpMyAdmin

1. Ouvrez phpMyAdmin (généralement à http://localhost/phpmyadmin)
2. Cliquez sur l'onglet "SQL"
3. Copiez et collez le contenu du fichier `create_database.sql`
4. Cliquez sur "Exécuter"

### Étape 2 : Vérifier la configuration

Le fichier `config.php` contient les paramètres de connexion :
- **Host**: localhost
- **Database**: portfolio_mr_euloge
- **User**: root
- **Password**: (vide par défaut)

Si votre configuration est différente, modifiez le fichier `config.php`.

### Étape 3 : Tester le formulaire de contact

1. Ouvrez votre portfolio dans le navigateur
2. Allez à la section Contact
3. Remplissez et envoyez le formulaire
4. Le message sera enregistré dans la base de données

### Étape 4 : Voir les messages reçus

Ouvrez dans votre navigateur :
```
http://localhost/votre-dossier/backend/admin/view_messages.php
```

## Structure de la table `contacts`

- `id` : Identifiant unique (auto-incrémenté)
- `name` : Nom de l'expéditeur
- `email` : Email de l'expéditeur
- `subject` : Sujet du message
- `message` : Contenu du message
- `created_at` : Date et heure de réception
- `is_read` : Statut de lecture (0 = non lu, 1 = lu)

## Fichiers backend

- `config.php` : Configuration de la connexion à la base de données
- `contact_handler.php` : Traitement des soumissions du formulaire
- `create_database.sql` : Script SQL pour créer la base et la table
- `admin/view_messages.php` : Interface pour consulter les messages
