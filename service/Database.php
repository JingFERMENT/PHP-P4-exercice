<?php

require_once (__DIR__ . '/../config/init.php');

class Database
{
    private static $pdo;
    
    // Fonction pour établir une connexion PDO
    public static function connect()
    {
        // Si l'instance PDO n'a pas encore été créée, on la crée
        if (!self::$pdo) {

            try {
                 // Création d'une nouvelle connexion PDO avec les constantes DSN, LOGIN et PASSWORD
            self::$pdo = new PDO(DSN, LOGIN, PASSWORD);

            // Définition de l'attribut par défaut pour récupérer les résultats sous forme d'objets
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Activer la mode d'erreur des exceptions  
            // ATTR_ERRM: mode pour reporter les erreurs de PDO.
            // ERRMODE_EXCEPTION: toutes les erreurs de base de données déclenchent une exception PDOException
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (\Throwable $e) {
                // Gestion des erreurs avec des messages personnalisés
                // echo "Impossible de se connecter à la base de données. Veuillez vérifier vos paramètres de connexion.";
                
                error_log("Erreur de connexion PDO : " . $e->getCode());
                
               
            }
           
        }
        // Retourne l'instance PDO (réutilisée si elle a déjà été créée)
        return self::$pdo;
    }
}


