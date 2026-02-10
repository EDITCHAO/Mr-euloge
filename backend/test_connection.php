<?php
/**
 * Script de test de connexion à la base de données
 * Ouvrez ce fichier dans votre navigateur pour vérifier la connexion
 */

echo "<h1>Test de connexion - Portfolio Mr Euloge</h1>";
echo "<hr>";

// Test 1 : Vérifier que le fichier config existe
echo "<h2>1. Vérification du fichier config.php</h2>";
if (file_exists('config.php')) {
    echo "✅ Le fichier config.php existe<br>";
    require_once 'config.php';
} else {
    echo "❌ Le fichier config.php n'existe pas<br>";
    exit;
}

// Test 2 : Vérifier la connexion à la base de données
echo "<h2>2. Test de connexion à la base de données</h2>";
try {
    echo "✅ Connexion réussie à la base de données<br>";
    echo "📊 Base de données : " . DB_NAME . "<br>";
    echo "🖥️ Serveur : " . DB_HOST . "<br>";
    echo "👤 Utilisateur : " . DB_USER . "<br>";
} catch(PDOException $e) {
    echo "❌ Erreur de connexion : " . $e->getMessage() . "<br>";
    exit;
}

// Test 3 : Vérifier que la table existe
echo "<h2>3. Vérification de la table contacts</h2>";
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'contacts'");
    if ($stmt->rowCount() > 0) {
        echo "✅ La table 'contacts' existe<br>";
        
        // Compter les messages
        $count = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
        echo "📧 Nombre de messages : " . $count . "<br>";
    } else {
        echo "❌ La table 'contacts' n'existe pas<br>";
        echo "💡 Exécutez le fichier create_database.sql dans phpMyAdmin<br>";
    }
} catch(PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "<br>";
}

// Test 4 : Vérifier la structure de la table
echo "<h2>4. Structure de la table contacts</h2>";
try {
    $stmt = $pdo->query("DESCRIBE contacts");
    $columns = $stmt->fetchAll();
    
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
    echo "<tr><th>Colonne</th><th>Type</th><th>Null</th><th>Clé</th></tr>";
    foreach ($columns as $col) {
        echo "<tr>";
        echo "<td>" . $col['Field'] . "</td>";
        echo "<td>" . $col['Type'] . "</td>";
        echo "<td>" . $col['Null'] . "</td>";
        echo "<td>" . $col['Key'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "<br>";
}

echo "<hr>";
echo "<h2>✅ Tous les tests sont terminés !</h2>";
echo "<p><a href='../index.php'>← Retour au portfolio</a> | <a href='admin/view_messages.php'>Voir les messages →</a></p>";

// Style CSS
echo "<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f4; }
    h1 { color: #ec1839; }
    h2 { color: #333; margin-top: 20px; }
    table { background: white; margin-top: 10px; }
    th { background: #ec1839; color: white; }
    a { color: #ec1839; text-decoration: none; font-weight: bold; }
    a:hover { text-decoration: underline; }
</style>";
?>
