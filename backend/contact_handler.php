<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Le nom est requis";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide";
    }
    
    if (empty($subject)) {
        $errors[] = "Le sujet est requis";
    }
    
    if (empty($message)) {
        $errors[] = "Le message est requis";
    }
    
    if (!empty($errors)) {
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
        exit;
    }
    
    // Insertion dans la base de données
    try {
        $stmt = $pdo->prepare("
            INSERT INTO contacts (name, email, subject, message, created_at) 
            VALUES (:name, :email, :subject, :message, NOW())
        ");
        
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Votre message a été envoyé avec succès!'
        ]);
        
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'errors' => ['Erreur lors de l\'enregistrement: ' . $e->getMessage()]
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'errors' => ['Méthode non autorisée']
    ]);
}
?>
