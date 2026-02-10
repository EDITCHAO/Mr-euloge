# ⚡ Guide Rapide - Portfolio Mr Euloge

## 🚀 Démarrage en 3 Minutes

### 1️⃣ Créer la Base de Données (2 min)
```
1. Ouvrir phpMyAdmin → http://localhost/phpmyadmin
2. Cliquer sur "SQL"
3. Copier/coller le contenu de backend/create_database.sql
4. Cliquer "Exécuter"
```

### 2️⃣ Tester la Connexion (30 sec)
```
Ouvrir : http://localhost/votre-dossier/backend/test_connection.php
Vous devez voir : ✅ Connexion réussie
```

### 3️⃣ Utiliser le Portfolio (30 sec)
```
Ouvrir : http://localhost/votre-dossier/index.php
Aller à la section Contact
Envoyer un message de test
```

## 📧 Voir les Messages Reçus
```
http://localhost/votre-dossier/backend/admin/view_messages.php
```

## 🔧 Configuration Rapide

### Si vous avez un mot de passe MySQL
Éditez `backend/config.php` ligne 4 :
```php
define('DB_PASS', 'votre_mot_de_passe');
```

### Si votre utilisateur n'est pas "root"
Éditez `backend/config.php` ligne 3 :
```php
define('DB_USER', 'votre_utilisateur');
```

## 📁 Fichiers Importants

| Fichier | Description |
|---------|-------------|
| `index.php` | Page principale |
| `backend/config.php` | Configuration DB |
| `backend/contact_handler.php` | Traitement formulaire |
| `backend/admin/view_messages.php` | Interface admin |
| `frontend/*.php` | Sections du site |

## 🎨 Modifier le Contenu

### Changer la section Accueil
```
Éditez : frontend/home.php
```

### Changer les Services
```
Éditez : frontend/service.php
```

### Changer le Portfolio
```
Éditez : frontend/portfolio.php
```

### Changer À Propos
```
Éditez : frontend/about.php
```

### Changer le Contact
```
Éditez : frontend/contact.php
```

## ⚠️ Problèmes Fréquents

### "Erreur de connexion à la base de données"
```
✅ Solution :
1. Vérifier que MySQL est démarré
2. Vérifier backend/config.php
3. Vérifier que la base existe dans phpMyAdmin
```

### "Page non trouvée"
```
✅ Solution :
1. Utiliser index.php (pas index.html)
2. Vérifier le chemin : http://localhost/nom-du-dossier/index.php
```

### Le formulaire ne s'envoie pas
```
✅ Solution :
1. Ouvrir la console (F12)
2. Vérifier les erreurs JavaScript
3. Tester backend/test_connection.php
```

## 🎯 Commandes Utiles

### Voir tous les messages dans phpMyAdmin
```sql
SELECT * FROM contacts ORDER BY created_at DESC;
```

### Compter les messages
```sql
SELECT COUNT(*) FROM contacts;
```

### Supprimer tous les messages de test
```sql
DELETE FROM contacts WHERE email LIKE '%test%';
```

### Marquer un message comme lu
```sql
UPDATE contacts SET is_read = 1 WHERE id = 1;
```

## 📱 URLs Importantes

| URL | Description |
|-----|-------------|
| `http://localhost/phpmyadmin` | phpMyAdmin |
| `http://localhost/votre-dossier/index.php` | Portfolio |
| `http://localhost/votre-dossier/backend/test_connection.php` | Test connexion |
| `http://localhost/votre-dossier/backend/admin/view_messages.php` | Messages reçus |

## 🎉 C'est Tout !

Votre portfolio est prêt à l'emploi. Pour plus de détails, consultez :
- `INSTRUCTIONS_INSTALLATION.md` : Guide complet
- `RESUME_MODIFICATIONS.md` : Détails des modifications
- `backend/README.md` : Documentation technique

**Bon développement ! 🚀**
