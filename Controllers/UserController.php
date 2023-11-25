<?php
include("Models/Client.php");
include("Models/Coach.php");
include("Models/UserModel.php");


class UserController {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    //espaces pour gerer les coachs :

    public function addCoach() {
        // Récupérer et nettoyer les données du formulaire d'ajout de coach
        $coachData = $this->sanitizeCoachData($_POST);

        // Valider les données avec des expressions régulières, y compris la validation du motif du mot de passe
        if ($this->validateCoachData($coachData)) {
            // Créer une instance de la classe Coach avec les données validées
            $coach = new Coach(
                $coachData['login'],
                password_hash($coachData['mdp'], PASSWORD_DEFAULT),
                $coachData['email'],
                $coachData['id'],
                $coachData['nom'],
                $coachData['prenom'],
                $coachData['sexe'],
                $coachData['age'],
                $coachData['specialite']
            );

            // Enregistrer le coach en utilisant le modèle approprié (UserModel pour l'ajout dans la base de données)
            $userModel = new UserModel();
            $userModel->addCoach($coach);

            // Rediriger vers une page de confirmation ou une autre page
            header('Location: coach_confirmation.php');
            exit();
        } else {
            // En cas d'erreur de validation, rediriger vers le formulaire avec un message d'erreur
            header('Location: index.php?action=showCoachForm&error=1');
            exit();
        }
    
    }

    private function sanitizeCoachData($data) {
        $sanitizedData = array();
        foreach ($data as $key => $value) {
            // Utilisez filter_var pour nettoyer chaque valeur
            $sanitizedData[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
        return $sanitizedData;
    }
    private function validateCoachData($data) {
        // Valider les données avec des expressions régulières, y compris la validation du motif du mot de passe
        $nomPattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/';
        $prenomPattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/';
        $specialitePattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/';
        $loginPattern = '/^[a-zA-Z0-9_-]+$/';
        $mdpPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        return (
            preg_match($nomPattern, $data['nom']) &&
            preg_match($prenomPattern, $data['prenom']) &&
            preg_match($specialitePattern, $data['specialite']) &&
            preg_match($loginPattern, $data['login']) &&
            preg_match($mdpPattern, $data['mdp']) &&
            preg_match($emailPattern, $data['email'])
        );
    }
    public function showCoaches() {
        // Charger la liste de tous les coachs
        $userModel = new UserModel();
        $coaches = $userModel->getAllCoachesAsObjects();

        // Afficher la vue des coachs (adaptez en fonction de votre structure de vue)
        include('Vue/VueCoachs.php');
    }


    public function showCoachDetails($coachId) {
        $userModel = new UserModel();
        $coachDetails = $userModel->getCoachById($coachId);
        include('Vue/VueCoach.php');
    }

    public function showRegistrationForm() {
        include('Vue/registration_coach.php');
    }




    //espace pour client :

    public function addClient() {
        $clientData = $this->sanitizeCoachData($_POST);
        // Vérifier si toutes les clés nécessaires sont présentes et si les données sont valides
        if (
            isset(
                $clientData['login'],
                $clientData['mdp'],
                $clientData['telephone'],
                $clientData['email'],
                $clientData['nom'],
                $clientData['prenom'],
                $clientData['sexe'],
                $clientData['age'],
                $clientData['AdrPostale']
            ) &&
            $this->validateClientData($clientData)
        ) {
            // Créer une instance de la classe Client avec les données validées
            $client = new Client(
                $clientData['login'],
                password_hash($clientData['mdp'], PASSWORD_DEFAULT),
                $clientData['telephone'],
                $clientData['email'],
                $clientData['nom'],
                $clientData['prenom'],
                $clientData['sexe'],
                $clientData['age'],
                $clientData['AdrPostale']
            );
    
            // Enregistrer le client en utilisant le modèle approprié (UserModel pour l'ajout dans la base de données)
            $userModel = new UserModel();
            $userModel->addClient($client);
    
            // Rediriger vers une page de confirmation ou une autre page
            header('Location: ../Vue/BourbonFitness.php');
            exit();
        } else {
            // En cas d'erreur de validation ou de clés manquantes, rediriger vers le formulaire avec un message d'erreur
            error_log("Erreur lors de l'ajout du client. Données invalides ou clés manquantes.");
            header('Location: index.php?action=showRegistrationForm&error=2');
            exit();
        }
    }
    

    private function sanitizeClientData($data) {
        $sanitizedData = array();
        foreach ($data as $key => $value) {
            // Utilisez filter_var pour nettoyer chaque valeur
            if ($key === 'telephone' || $key === 'age') {
                // Si c'est un champ numérique, utilisez FILTER_SANITIZE_NUMBER_INT
                $sanitizedData[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            } else {
                // Sinon, utilisez FILTER_SANITIZE_STRING
                $sanitizedData[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
        }
        return $sanitizedData;
    }

    public function validateClientData($data) {
        // Valider les données avec des expressions régulières, y compris la validation du motif du mot de passe
        $nomPattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/';
        $prenomPattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s\'-]+$/';
        $loginPattern = '/^[a-zA-Z0-9_-]+$/';
        $mdpPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        
        // Effectuer la validation pour chaque champ
        $nomIsValid = preg_match($nomPattern, $data['nom']);
        $prenomIsValid = preg_match($prenomPattern, $data['prenom']);
        $loginIsValid = preg_match($loginPattern, $data['login']);
        $mdpIsValid = preg_match($mdpPattern, $data['mdp']);
        $emailIsValid = preg_match($emailPattern, $data['email']);
    
        // Afficher des messages d'erreur spécifiques en cas d'échec de validation
        if (!$nomIsValid) {
            error_log("Erreur de validation: Le champ 'nom' n'est pas valide.");
        }
        if (!$prenomIsValid) {
            error_log("Erreur de validation: Le champ 'prenom' n'est pas valide.");
        }
        if (!$loginIsValid) {
            error_log("Erreur de validation: Le champ 'login' n'est pas valide.");
        }
        if (!$mdpIsValid) {
            error_log("Erreur de validation: Le champ 'mdp' n'est pas valide.");
        }
        if (!$emailIsValid) {
            error_log("Erreur de validation: Le champ 'email' n'est pas valide.");
        }
    
        // Retourner vrai seulement si tous les champs sont valides
        return $nomIsValid && $prenomIsValid && $loginIsValid && $mdpIsValid && $emailIsValid;
    }
    
    public function showClientForm() {
        include('Vue/registration_client.php');
    }

    //espace pour les deux (authentification ):

        public function login($login, $mdp) {
            // Vérification dans la table des coachs
            $coach = $this->findUserByLogin('coach', $login);
        
            if ($coach && password_verify($mdp, $coach['mdp'])) {
                // Authentification réussie en tant que coach
                return new Coach($coach);
            } else {
                // Si l'authentification en tant que coach échoue, vérifier dans la table des clients
                $client = $this->findUserByLogin('client', $login);
        
                if ($client && password_verify($mdp, $client['mdp'])) {
                    // Authentification réussie en tant que client
                    return new Client($client);
                } else {
                    // Échec de l'authentification
                    return false;
                }
            }
        }
    
        private function findUserByLogin($table, $login) {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE login = :login");
            $stmt->bindValue(':login', $login);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
            
            public function validateLoginData($data) {
                if (empty($data['idCoach']) && empty($data['idClient'])) {
                    return false;
                }
                if (empty($data['mdp'])) {
                    return false;
                }
                return true;
            
            }
        
            public function sanitizeLoginData($data) {
                $cleanData = array();
                foreach ($data as $key => $value) {
                    $cleanData[$key] = trim(strip_tags($value));
                }
                return $cleanData;
            }
            
    


}
