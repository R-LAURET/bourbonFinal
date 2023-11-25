<?php
session_start();
require_once('Controllers/UserController.php');

// Récupérer l'action à partir de la requête
$action = isset($_GET['action']) ? $_GET['action'] : 'showRegistrationForm';

$config = require 'config/database.php';

// Paramètres de la base de données
$dbHost = $config['host'];
$dbName = $config['database'];
$dbUser = $config['username'];
$dbPass = $config['password'];

try {
    // Création de l'instance PDO
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    // Configuration supplémentaire de PDO si nécessaire
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
// Instancier le contrôleur
$userController = new UserController($db);

// Dispatcher les actions vers les méthodes du contrôleur appropriées
switch ($action) {
    case 'showRegistrationForm':
        $userController->showRegistrationForm();
        break;
    case 'register':
        $userController->register();
        break;
    case 'showCoach':
        $coachLogin = isset($_GET['login']) ? $_GET['login'] : null;
        $userController->showCoachDetails($coachLogin);
        break;
    case 'showCoaches':
        $userController->showCoaches();
        break;
    case 'showClientForm':
        $userController->showClientForm();
        break;
    case 'Connexion':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $login = isset($_POST['login']) ? $_POST['login'] : null;
            $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;
        
            // Appeler la méthode addClient du UserController avec les données du formulaire
            $userController->addClient($_POST);
        
            // Rediriger ou effectuer d'autres actions après l'ajout du client
            header('Location: client_confirmation.php');
            exit();
        } else {
            // Afficher un message d'erreur ou rediriger vers une page d'erreur
            echo "Erreur : Le formulaire n'a pas été soumis correctement.";
        }
        
    case 'addCoach':
        $userController->addCoach();
        break;
    case 'showClients':
        $userController->showClients();
        break;
    case 'showClientForm':
        $userController->showClientForm();
        break;
    case 'addClient':
        $userController->addClient();
        break;
    // Ajoutez d'autres actions au besoin
    default:
        // Gérer les actions non reconnues, rediriger vers le formulaire d'inscription par exemple
        header('Location: index.php?action=showRegistrationForm');
        exit();
}
?>
