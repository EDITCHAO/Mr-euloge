Internal Server Error
The server encountered an internal error or misconfiguration and was unable to complete your request.

Please contact the server administrator at postmaster@localhost to inform them of the time this error occurred, and the actions you performed just before this error.

More information about this error may be available in the server error log.-- Script SQL pour créer UNIQUEMENT la table contacts
-- À utiliser si vous avez déjà créé la base de données "portfolio"
-- À exécuter dans phpMyAdmin

-- Sélectionner votre base de données
USE portfolio;

-- Création de la table contacts
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL COMMENT 'Nom du visiteur',
    email VARCHAR(150) NOT NULL COMMENT 'Email du visiteur',
    subject VARCHAR(200) NOT NULL COMMENT 'Sujet du message',
    message TEXT NOT NULL COMMENT 'Contenu du message',
    created_at DATETIME NOT NULL COMMENT 'Date et heure de réception',
    is_read BOOLEAN DEFAULT FALSE COMMENT 'Message lu ou non (0=non lu, 1=lu)',
    INDEX idx_created_at (created_at),
    INDEX idx_is_read (is_read)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table pour stocker les messages du formulaire de contact';

-- Vérifier que la table a été créée
SHOW TABLES;

-- Afficher la structure de la table
DESCRIBE contacts;
