<?php
require_once 'auth_check.php';
require_once '../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $messageId = (int)$_POST['id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$messageId]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Message supprimé avec succès'
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de la suppression : ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Requête invalide'
    ]);
}
?>
