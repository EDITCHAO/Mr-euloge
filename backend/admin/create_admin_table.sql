-- Script SQL pour créer la table des administrateurs
-- À exécuter dans phpMyAdmin

USE portfolio;

-- Création de la table admin_users
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(150),
    created_at DATETIME NOT NULL,
    last_login DATETIME,
    INDEX idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insérer l'utilisateur admin (username: euloge, password: 2086)
-- Le mot de passe est hashé avec password_hash()
INSERT INTO admin_users (username, password, email, created_at) 
VALUES ('euloge', '$2y$10$YourHashedPasswordHere', 'editchaosam@gmail.com', NOW());

-- Note: Le hash ci-dessus est un exemple. Le vrai hash sera créé par le script PHP
