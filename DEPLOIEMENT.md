# 🚀 Guide de Déploiement - Portfolio Mr Euloge

## 📋 Checklist Avant Déploiement

### Sécurité
- [ ] Changer les identifiants de la base de données
- [ ] Utiliser un mot de passe fort pour MySQL
- [ ] Activer HTTPS (certificat SSL)
- [ ] Désactiver l'affichage des erreurs PHP en production
- [ ] Protéger l'accès à l'interface admin
- [ ] Vérifier les permissions des fichiers

### Configuration
- [ ] Mettre à jour `backend/config.php` avec les identifiants de production
- [ ] Vérifier les chemins absolus/relatifs
- [ ] Tester tous les formulaires
- [ ] Vérifier les liens internes
- [ ] Optimiser les images

### Performance
- [ ] Activer la compression GZIP
- [ ] Minifier CSS et JavaScript
- [ ] Optimiser les images (compression)
- [ ] Configurer le cache navigateur
- [ ] Tester la vitesse de chargement

## 🌐 Déploiement sur Hébergement Partagé

### 1. Préparer les Fichiers

```bash
# Créer une archive du projet
zip -r portfolio.zip * -x "*.git*" -x "node_modules/*"
```

### 2. Uploader via FTP

**Logiciels recommandés :**
- FileZilla (gratuit)
- WinSCP (Windows)
- Cyberduck (Mac)

**Connexion FTP :**
```
Hôte : ftp.votre-hebergeur.com
Utilisateur : votre_username
Mot de passe : votre_password
Port : 21 (ou 22 pour SFTP)
```

**Dossiers à uploader :**
```
/public_html/
├── backend/
├── frontend/
├── css/
├── js/
├── images/
├── index.php
└── .htaccess
```

### 3. Créer la Base de Données

**Via cPanel :**
1. Aller dans "MySQL Databases"
2. Créer une nouvelle base : `username_portfolio`
3. Créer un utilisateur MySQL
4. Assigner l'utilisateur à la base
5. Noter les identifiants

**Via phpMyAdmin :**
1. Se connecter à phpMyAdmin
2. Cliquer sur "SQL"
3. Copier/coller `backend/create_database.sql`
4. Modifier le nom de la base si nécessaire
5. Exécuter

### 4. Configurer la Connexion

Éditer `backend/config.php` :
```php
define('DB_HOST', 'localhost'); // ou l'hôte fourni par l'hébergeur
define('DB_NAME', 'username_portfolio');
define('DB_USER', 'username_dbuser');
define('DB_PASS', 'mot_de_passe_fort');
```

### 5. Tester le Site

```
https://votre-domaine.com/backend/test_connection.php
```

## 🔒 Sécurisation en Production

### 1. Désactiver l'Affichage des Erreurs

Créer/éditer `php.ini` ou `.htaccess` :
```apache
php_flag display_errors off
php_flag log_errors on
php_value error_log /home/username/logs/php_errors.log
```

### 2. Protéger l'Interface Admin

Créer `backend/admin/.htaccess` :
```apache
AuthType Basic
AuthName "Zone Administrateur"
AuthUserFile /chemin/absolu/.htpasswd
Require valid-user
```

Créer le fichier `.htpasswd` :
```bash
htpasswd -c .htpasswd admin
# Entrer le mot de passe
```

### 3. Permissions des Fichiers

```bash
# Fichiers
find . -type f -exec chmod 644 {} \;

# Dossiers
find . -type d -exec chmod 755 {} \;

# Fichiers sensibles
chmod 600 backend/config.php
```

### 4. Activer HTTPS

Ajouter dans `.htaccess` :
```apache
# Forcer HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## 🌍 Déploiement sur VPS (Ubuntu/Debian)

### 1. Installer LAMP Stack

```bash
# Mettre à jour le système
sudo apt update && sudo apt upgrade -y

# Installer Apache
sudo apt install apache2 -y

# Installer MySQL
sudo apt install mysql-server -y
sudo mysql_secure_installation

# Installer PHP
sudo apt install php libapache2-mod-php php-mysql php-cli php-curl php-json -y

# Activer mod_rewrite
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### 2. Configurer le Virtual Host

```bash
sudo nano /etc/apache2/sites-available/portfolio.conf
```

Contenu :
```apache
<VirtualHost *:80>
    ServerName votre-domaine.com
    ServerAlias www.votre-domaine.com
    DocumentRoot /var/www/portfolio
    
    <Directory /var/www/portfolio>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/portfolio_error.log
    CustomLog ${APACHE_LOG_DIR}/portfolio_access.log combined
</VirtualHost>
```

Activer le site :
```bash
sudo a2ensite portfolio.conf
sudo systemctl reload apache2
```

### 3. Uploader les Fichiers

```bash
# Via Git
cd /var/www
sudo git clone https://github.com/votre-username/portfolio.git

# Ou via SCP
scp -r portfolio/ user@server:/var/www/
```

### 4. Configurer MySQL

```bash
sudo mysql -u root -p
```

```sql
CREATE DATABASE portfolio_mr_euloge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'portfolio_user'@'localhost' IDENTIFIED BY 'mot_de_passe_fort';
GRANT ALL PRIVILEGES ON portfolio_mr_euloge.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Importer la structure :
```bash
sudo mysql -u root -p portfolio_mr_euloge < /var/www/portfolio/backend/create_database.sql
```

### 5. Installer SSL (Let's Encrypt)

```bash
# Installer Certbot
sudo apt install certbot python3-certbot-apache -y

# Obtenir le certificat
sudo certbot --apache -d votre-domaine.com -d www.votre-domaine.com

# Renouvellement automatique
sudo certbot renew --dry-run
```

## 📊 Monitoring et Maintenance

### Logs à Surveiller

```bash
# Logs Apache
tail -f /var/log/apache2/error.log
tail -f /var/log/apache2/access.log

# Logs PHP
tail -f /var/log/php_errors.log

# Logs MySQL
tail -f /var/log/mysql/error.log
```

### Sauvegardes Automatiques

Script de sauvegarde (`backup.sh`) :
```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/home/backups"

# Sauvegarde de la base de données
mysqldump -u portfolio_user -p'password' portfolio_mr_euloge > $BACKUP_DIR/db_$DATE.sql

# Sauvegarde des fichiers
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/portfolio

# Supprimer les sauvegardes de plus de 30 jours
find $BACKUP_DIR -type f -mtime +30 -delete
```

Ajouter au cron :
```bash
crontab -e
# Ajouter : 0 2 * * * /home/scripts/backup.sh
```

## 🔍 Tests Post-Déploiement

### Checklist de Test

- [ ] Page d'accueil se charge correctement
- [ ] Toutes les sections sont visibles
- [ ] Navigation fonctionne
- [ ] Images s'affichent
- [ ] Formulaire de contact fonctionne
- [ ] Messages sont enregistrés dans la DB
- [ ] Interface admin accessible
- [ ] HTTPS actif (cadenas vert)
- [ ] Site responsive sur mobile
- [ ] Vitesse de chargement < 3 secondes

### Outils de Test

- **PageSpeed Insights** : https://pagespeed.web.dev/
- **GTmetrix** : https://gtmetrix.com/
- **SSL Labs** : https://www.ssllabs.com/ssltest/
- **Mobile-Friendly Test** : https://search.google.com/test/mobile-friendly

## 📞 Support

En cas de problème :
1. Vérifier les logs d'erreur
2. Tester la connexion DB avec `test_connection.php`
3. Vérifier les permissions des fichiers
4. Contacter le support de l'hébergeur

## 🎉 Félicitations !

Votre portfolio est maintenant en ligne et accessible au monde entier ! 🌍

N'oubliez pas de :
- Surveiller les messages reçus
- Faire des sauvegardes régulières
- Mettre à jour le contenu
- Optimiser le SEO

**Bon succès avec votre portfolio ! 🚀**
