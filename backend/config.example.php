<?php
/**
 * Fichier de configuration EXEMPLE
 * 
 * INSTRUCTIONS :
 * 1. Copiez ce fichier et renommez-le en "config.php"
 * 2. Modifiez les valeurs ci-dessous selon votre configuration
 * 3. Ne commitez JAMAIS le fichier config.php (il est dans .gitignore)
 */

// Configuration de la base de données
define('DB_HOST', 'localhost');              // Serveur MySQL (généralement localhost)
define('DB_NAME', 'portfolio_mr_euloge');    // Nom de la base de données
define('DB_USER', 'root');                   // Utilisateur MySQL (root par défaut)
define('DB_PASS', '');                       // Mot de passe MySQL (vide par défaut sur XAMPP/WAMP)

// Connexion à la base de données
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
