<?php
/**
 * Script pour créer l'utilisateur admin
 * À exécuter UNE SEULE FOIS pour créer le compte admin
 * Ensuite, supprimez ce fichier pour la sécurité
 */

require_once '../config.php';

// Créer la table admin_users
$createTable = "
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150),
    created_at DATETIME NOT NULL,
    last_login DATETIME,
    INDEX idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
";

try {
    $pdo->exec($createTable);
    echo "<h2>✅ Table admin_users créée avec succès</h2>";
} catch(PDOException $e) {
    echo "<h2>❌ Erreur lors de la création de la table : " . $e->getMessage() . "</h2>";
}

// Créer l'utilisateur admin
$username = 'euloge';
$password = '2086';
$email = 'editchaosam@gmail.com';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT id FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    
    if ($stmt->rowCount() > 0) {
        echo "<h2>⚠️ L'utilisateur 'euloge' existe déjà</h2>";
    } else {
        // Insérer le nouvel utilisateur
        $stmt = $pdo->prepare("
            INSERT INTO admin_users (username, password, email, created_at) 
            VALUES (?, ?, ?, NOW())
        ");
        $stmt->execute([$username, $hashedPassword, $email]);
        
        echo "<h2>✅ Utilisateur admin créé avec succès !</h2>";
        echo "<p><strong>Username:</strong> euloge</p>";
        echo "<p><strong>Password:</strong> 2086</p>";
    }
} catch(PDOException $e) {
    echo "<h2>❌ Erreur : " . $e->getMessage() . "</h2>";
}

echo "<hr>";
echo "<h3>🔒 IMPORTANT : Supprimez ce fichier après utilisation !</h3>";
echo "<p>Pour des raisons de sécurité, supprimez le fichier <code>setup_admin.php</code> après avoir créé votre compte.</p>";
echo "<hr>";
echo "<p><a href='login.php'>→ Aller à la page de connexion</a></p>";
?>
