# 🔐 Instructions Admin - Portfolio Mr Euloge

## 📋 Installation du Système Admin

### Étape 1 : Créer le compte admin (1 minute)

Ouvrez dans votre navigateur :
```
http://localhost/PROJET/portfolio/backend/admin/setup_admin.php
```

Ce script va :
- ✅ Créer la table `admin_users`
- ✅ Créer votre compte admin
  - **Username** : euloge
  - **Password** : 2086

**IMPORTANT** : Après avoir exécuté ce script, supprimez le fichier `setup_admin.php` pour la sécurité !

---

### Étape 2 : Se connecter

Ouvrez la page de connexion :
```
http://localhost/PROJET/portfolio/backend/admin/login.php
```

Entrez vos identifiants :
- **Username** : euloge
- **Password** : 2086

---

## 🎯 Utilisation

### Dashboard Admin
```
http://localhost/PROJET/portfolio/backend/admin/dashboard.php
```

Le dashboard affiche :
- 📊 Statistiques (total messages, non lus, aujourd'hui)
- 📬 Les 5 derniers messages reçus
- 🔗 Liens rapides vers toutes les sections

---

### Voir Tous les Messages
```
http://localhost/PROJET/portfolio/backend/admin/view_messages.php
```

Cette page affiche :
- 📋 Tous les messages dans un tableau
- 📅 Date et heure de réception
- 👤 Nom et email de l'expéditeur
- 📝 Sujet et message
- ✅ Statut (lu/non lu)

---

### Déconnexion
```
http://localhost/PROJET/portfolio/backend/admin/logout.php
```

Ou cliquez sur le bouton "Déconnexion" dans le menu.

---

## 🔒 Sécurité

### Fonctionnalités de Sécurité Implémentées

1. **Mot de passe hashé** : Le mot de passe est stocké avec `password_hash()` (bcrypt)
2. **Sessions sécurisées** : Authentification par session PHP
3. **Protection des pages** : Toutes les pages admin vérifient l'authentification
4. **Déconnexion sécurisée** : Destruction complète de la session

### Recommandations

- ✅ Supprimez `setup_admin.php` après l'installation
- ✅ Changez le mot de passe par défaut (2086)
- ✅ Utilisez HTTPS en production
- ✅ Ne partagez jamais vos identifiants

---

## 📁 Structure des Fichiers Admin

```
backend/admin/
├── login.php              ← Page de connexion
├── dashboard.php          ← Dashboard principal
├── view_messages.php      ← Liste des messages
├── auth_check.php         ← Vérification d'authentification
├── logout.php             ← Déconnexion
├── setup_admin.php        ← Installation (à supprimer après)
└── create_admin_table.sql ← Script SQL (référence)
```

---

## 🔧 Changer le Mot de Passe

### Méthode 1 : Via phpMyAdmin

1. Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
2. Sélectionner la base `portfolio`
3. Cliquer sur la table `admin_users`
4. Cliquer sur "Modifier" pour l'utilisateur `euloge`
5. Dans le champ `password`, entrer le nouveau mot de passe
6. Dans la fonction, sélectionner `PASSWORD` ou `MD5`
7. Cliquer "Exécuter"

### Méthode 2 : Via SQL

```sql
-- Générer un nouveau hash (remplacez 'nouveau_mot_de_passe')
UPDATE admin_users 
SET password = '$2y$10$...' 
WHERE username = 'euloge';
```

Pour générer le hash, utilisez ce code PHP :
```php
<?php
echo password_hash('nouveau_mot_de_passe', PASSWORD_DEFAULT);
?>
```

---

## 🎨 Personnalisation

### Changer le Nom d'Utilisateur

Modifiez dans `setup_admin.php` avant l'installation :
```php
$username = 'votre_username';
```

### Ajouter un Nouvel Admin

Exécutez ce SQL dans phpMyAdmin :
```sql
INSERT INTO admin_users (username, password, email, created_at) 
VALUES ('nouveau_admin', '$2y$10$...', 'email@example.com', NOW());
```

---

## 📊 Base de Données

### Table `admin_users`

| Colonne | Type | Description |
|---------|------|-------------|
| `id` | INT | Identifiant unique |
| `username` | VARCHAR(50) | Nom d'utilisateur |
| `password` | VARCHAR(255) | Mot de passe hashé |
| `email` | VARCHAR(150) | Email (optionnel) |
| `created_at` | DATETIME | Date de création |
| `last_login` | DATETIME | Dernière connexion |

---

## ⚠️ Problèmes Courants

### "Identifiants incorrects"
- Vérifiez que vous avez bien exécuté `setup_admin.php`
- Vérifiez que la table `admin_users` existe dans phpMyAdmin
- Username : `euloge` (en minuscules)
- Password : `2086`

### "Erreur de connexion à la base de données"
- Vérifiez que MySQL est démarré
- Vérifiez `backend/config.php`
- Vérifiez que la base `portfolio` existe

### Redirection infinie
- Videz le cache du navigateur
- Supprimez les cookies
- Essayez en navigation privée

---

## 🚀 URLs Importantes

| Page | URL |
|------|-----|
| **Installation** | `http://localhost/PROJET/portfolio/backend/admin/setup_admin.php` |
| **Login** | `http://localhost/PROJET/portfolio/backend/admin/login.php` |
| **Dashboard** | `http://localhost/PROJET/portfolio/backend/admin/dashboard.php` |
| **Messages** | `http://localhost/PROJET/portfolio/backend/admin/view_messages.php` |
| **Déconnexion** | `http://localhost/PROJET/portfolio/backend/admin/logout.php` |

---

## ✅ Checklist d'Installation

- [ ] Exécuter `setup_admin.php`
- [ ] Vérifier que le compte est créé
- [ ] Supprimer `setup_admin.php`
- [ ] Tester la connexion avec euloge/2086
- [ ] Accéder au dashboard
- [ ] Vérifier que les messages s'affichent

---

**Système admin créé avec succès ! 🎉**

*Développé par Mr Euloge - Février 2026*
