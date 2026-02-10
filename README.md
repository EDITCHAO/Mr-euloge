# 🌟 Portfolio Mr Euloge

Portfolio professionnel de **EDITCHAO Sam Euloge** - Développeur Full Stack & Data Analyst

![Version](https://img.shields.io/badge/version-2.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.4+-purple)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange)
![License](https://img.shields.io/badge/license-MIT-green)

## 📋 Description

Portfolio moderne et responsive présentant mes compétences en développement web, data analysis, et mes projets réalisés. Le site inclut un formulaire de contact fonctionnel avec stockage des messages dans une base de données MySQL.

## ✨ Fonctionnalités

- ✅ Design moderne et responsive (mobile, tablette, desktop)
- ✅ Navigation fluide avec animations
- ✅ Sections : Home, About, Services, Portfolio, Contact
- ✅ Formulaire de contact avec validation
- ✅ Stockage des messages dans MySQL
- ✅ Interface d'administration pour consulter les messages
- ✅ Changement de thème de couleur
- ✅ Mode jour/nuit
- ✅ Optimisé pour le SEO

## 🚀 Installation Rapide

### Prérequis
- XAMPP, WAMP, ou MAMP (Apache + MySQL + PHP 7.4+)
- Navigateur web moderne

### Étapes d'installation

1. **Cloner ou télécharger le projet**
   ```bash
   git clone https://github.com/votre-username/portfolio-mr-euloge.git
   ```

2. **Placer dans le dossier web**
   - XAMPP : `C:\xampp\htdocs\portfolio`
   - WAMP : `C:\wamp64\www\portfolio`

3. **Créer la base de données**
   - Ouvrir phpMyAdmin : `http://localhost/phpmyadmin`
   - Cliquer sur "SQL"
   - Copier/coller le contenu de `backend/create_database.sql`
   - Cliquer "Exécuter"

4. **Configurer la connexion**
   ```bash
   cd backend
   cp config.example.php config.php
   # Éditer config.php si nécessaire
   ```

5. **Tester l'installation**
   - Ouvrir : `http://localhost/portfolio/backend/test_connection.php`
   - Vérifier que tout est ✅

6. **Accéder au portfolio**
   - Ouvrir : `http://localhost/portfolio/index.php`

## 📁 Structure du Projet

```
portfolio/
├── backend/                    # Code PHP backend
│   ├── admin/
│   │   └── view_messages.php  # Interface admin
│   ├── config.php             # Configuration DB
│   ├── config.example.php     # Exemple de config
│   ├── contact_handler.php    # Traitement formulaire
│   ├── create_database.sql    # Script SQL
│   ├── test_connection.php    # Test de connexion
│   └── README.md
├── frontend/                   # Sections du site
│   ├── home.php
│   ├── about.php
│   ├── service.php
│   ├── portfolio.php
│   └── contact.php
├── css/                        # Styles
│   ├── style.css
│   ├── style-switcher.css
│   └── skins/
├── js/                         # Scripts JavaScript
│   ├── script.js
│   └── style-switcher.js
├── images/                     # Images et médias
├── index.php                   # Page principale
├── .htaccess                   # Configuration Apache
├── .gitignore
└── README.md
```

## 🎨 Technologies Utilisées

### Frontend
- HTML5
- CSS3 (Flexbox, Grid, Animations)
- JavaScript (Vanilla JS)
- Font Awesome 5.15.4
- Typed.js 2.0.12

### Backend
- PHP 7.4+
- MySQL 5.7+ / MariaDB
- PDO (PHP Data Objects)

### Serveur
- Apache 2.4+
- mod_rewrite

## 📖 Documentation

- **[GUIDE_RAPIDE.md](GUIDE_RAPIDE.md)** - Démarrage en 3 minutes
- **[INSTRUCTIONS_INSTALLATION.md](INSTRUCTIONS_INSTALLATION.md)** - Guide complet
- **[RESUME_MODIFICATIONS.md](RESUME_MODIFICATIONS.md)** - Détails des modifications
- **[backend/README.md](backend/README.md)** - Documentation technique

## 🔧 Configuration

### Base de Données
Éditez `backend/config.php` :
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_mr_euloge');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### Couleurs du Thème
5 thèmes disponibles dans `css/skins/` :
- color-1.css (Rouge - par défaut)
- color-2.css (Bleu)
- color-3.css (Vert)
- color-4.css (Orange)
- color-5.css (Violet)

## 📧 Utilisation

### Formulaire de Contact
Les visiteurs peuvent envoyer des messages via le formulaire. Les données sont stockées dans la table `contacts`.

### Consulter les Messages
Accédez à : `http://localhost/portfolio/backend/admin/view_messages.php`

### Requêtes SQL Utiles
```sql
-- Voir tous les messages
SELECT * FROM contacts ORDER BY created_at DESC;

-- Messages non lus
SELECT * FROM contacts WHERE is_read = 0;

-- Marquer comme lu
UPDATE contacts SET is_read = 1 WHERE id = 1;
```

## 🛡️ Sécurité

- ✅ Requêtes SQL préparées (PDO)
- ✅ Validation des données côté serveur
- ✅ Protection des fichiers sensibles (.htaccess)
- ✅ Échappement des sorties HTML
- ✅ Configuration sécurisée de PDO

## 🚧 Améliorations Futures

- [ ] Système d'authentification admin
- [ ] Envoi d'emails automatiques
- [ ] Captcha anti-spam
- [ ] Dashboard analytics
- [ ] Version multilingue (FR/EN)
- [ ] Blog intégré
- [ ] API REST

## 📱 Responsive Design

Le site est optimisé pour :
- 📱 Smartphones (320px - 767px)
- 📱 Tablettes (768px - 991px)
- 💻 Laptops (992px - 1199px)
- 🖥️ Desktops (1200px+)

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
1. Fork le projet
2. Créer une branche (`git checkout -b feature/amelioration`)
3. Commit vos changements (`git commit -m 'Ajout d'une fonctionnalité'`)
4. Push vers la branche (`git push origin feature/amelioration`)
5. Ouvrir une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 👤 Auteur

**EDITCHAO Sam Euloge**
- Portfolio : [www.Mr-euloge.com](http://www.Mr-euloge.com)
- Email : editchaosam@gmail.com
- Téléphone : +228 99 25 38 43
- Localisation : Lomé, Togo

## 🙏 Remerciements

- Font Awesome pour les icônes
- Typed.js pour l'effet de frappe
- La communauté open source

---

⭐ Si ce projet vous a aidé, n'hésitez pas à lui donner une étoile !

**Fait avec ❤️ par Mr Euloge**
