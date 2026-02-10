<?php
require_once 'auth_check.php';
require_once '../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $messageId = (int)$_POST['id'];
    
    try {
        $stmt = $pdo->prepare("UPDATE contacts SET is_read = 1 WHERE id = ?");
        $stmt->execute([$messageId]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Message marqué comme lu'
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur : ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Requête invalide'
    ]);
}
?>
