<?php
// Fichier à inclure dans toutes les pages admin pour vérifier l'authentification
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Fonction pour obtenir le nom de l'admin connecté
function getAdminUsername() {
    return $_SESSION['admin_username'] ?? 'Admin';
}
?>
