# 📋 Instructions d'installation - Portfolio Mr Euloge

## ✅ Ce qui a été fait

Votre portfolio a été complètement réorganisé :

### Structure des dossiers
```
portfolio/
├── backend/                    # Tout le code PHP backend
│   ├── admin/
│   │   └── view_messages.php  # Page pour voir les messages
│   ├── config.php             # Configuration base de données
│   ├── contact_handler.php    # Traitement du formulaire
│   ├── create_database.sql    # Script SQL
│   └── README.md
├── frontend/                   # Sections du site
│   ├── home.php
│   ├── about.php
│   ├── service.php
│   ├── portfolio.php
│   └── contact.php
├── css/                        # Styles
├── js/                         # Scripts JavaScript
├── images/                     # Images
└── index.php                   # Page principale
```

## 🚀 Installation en 5 étapes

### Étape 1 : Démarrer votre serveur local
- Démarrez XAMPP, WAMP ou MAMP
- Assurez-vous qu'Apache et MySQL sont démarrés

### Étape 2 : Créer la base de données
1. Ouvrez phpMyAdmin : `http://localhost/phpmyadmin`
2. Cliquez sur l'onglet **"SQL"**
3. Ouvrez le fichier `backend/create_database.sql`
4. Copiez tout le contenu
5. Collez-le dans phpMyAdmin
6. Cliquez sur **"Exécuter"**

✅ Vous devriez voir :
- Base de données : `portfolio_mr_euloge`
- Table : `contacts` avec 7 colonnes

### Étape 3 : Vérifier la configuration
Ouvrez `backend/config.php` et vérifiez :
```php
define('DB_HOST', 'localhost');     // OK pour la plupart
define('DB_NAME', 'portfolio_mr_euloge');
define('DB_USER', 'root');          // Par défaut
define('DB_PASS', '');              // Vide par défaut
```

Si vous avez un mot de passe MySQL, modifiez `DB_PASS`.

### Étape 4 : Tester le site
1. Placez votre dossier dans `htdocs` (XAMPP) ou `www` (WAMP)
2. Ouvrez : `http://localhost/votre-dossier/index.php`
3. Naviguez vers la section **Contact**
4. Remplissez et envoyez le formulaire

### Étape 5 : Voir les messages reçus
Ouvrez : `http://localhost/votre-dossier/backend/admin/view_messages.php`

Vous verrez tous les messages dans un tableau.

## 🔧 Corrections effectuées

### 1. Chemins des images corrigés
❌ Avant : `D:\PROJET\EDITCHAO Sam Euloge\images\portfolio\MOI.jpeg`
✅ Après : `images/portfolio/MOI.jpeg`

### 2. Organisation des fichiers
- Toutes les sections sont maintenant dans `frontend/`
- Tout le code PHP backend est dans `backend/`
- Le fichier principal `index.php` inclut toutes les sections

### 3. Formulaire de contact fonctionnel
- Validation des données
- Protection contre les injections SQL
- Messages de succès/erreur en JSON
- Enregistrement dans la base de données

### 4. Interface d'administration
- Page pour consulter tous les messages
- Affichage de la date, nom, email, sujet, message
- Indication des messages non lus

## 📝 Utilisation

### Pour modifier une section
Éditez le fichier correspondant dans `frontend/` :
- `home.php` : Section d'accueil
- `about.php` : À propos
- `service.php` : Services
- `portfolio.php` : Portfolio
- `contact.php` : Contact

### Pour voir les messages
Allez sur : `backend/admin/view_messages.php`

### Pour modifier la connexion DB
Éditez : `backend/config.php`

## ⚠️ Problèmes courants

### "Erreur de connexion à la base de données"
- Vérifiez que MySQL est démarré
- Vérifiez les identifiants dans `config.php`
- Assurez-vous que la base `portfolio_mr_euloge` existe

### "Page non trouvée"
- Vérifiez que vous utilisez `index.php` et non `index.html`
- Assurez-vous d'être dans le bon dossier

### Le formulaire ne s'envoie pas
- Ouvrez la console du navigateur (F12)
- Vérifiez les erreurs JavaScript
- Vérifiez que le chemin vers `backend/contact_handler.php` est correct

## 🎉 C'est prêt !

Votre portfolio est maintenant :
- ✅ Bien organisé
- ✅ Avec une base de données fonctionnelle
- ✅ Avec un formulaire de contact qui enregistre les messages
- ✅ Avec une interface pour consulter les messages

Bon développement ! 🚀
