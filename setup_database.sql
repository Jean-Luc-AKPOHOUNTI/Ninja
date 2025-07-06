-- Créer la base de données
CREATE DATABASE IF NOT EXISTS ninja_db;

-- Créer l'utilisateur
CREATE USER IF NOT EXISTS 'ninja_user'@'localhost' IDENTIFIED BY 'ninja_password123';

-- Donner les privilèges à l'utilisateur
GRANT ALL PRIVILEGES ON ninja_db.* TO 'ninja_user'@'localhost';

-- Appliquer les changements
FLUSH PRIVILEGES;

-- Afficher les bases de données pour vérifier
SHOW DATABASES;

-- Afficher les utilisateurs pour vérifier
SELECT User, Host FROM mysql.user WHERE User = 'ninja_user'; 