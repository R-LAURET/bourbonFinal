<?php
// models/UserModel.php

class UserModel {
    private $db;

    public function __construct() {
        // Initialisez la connexion à la base de données (vous pouvez le faire dans un fichier de configuration séparé)
        $dbConfig = include('Config/database.php');
        $this->db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['database']}", $dbConfig['username'], $dbConfig['password']);
    }

    public function addClient(Client $clientData) {
        $query = $this->db->prepare("INSERT INTO client (nomClient, prenomClient, sexeClient, ageClient, AdrPostale, email, telephoneClient, login, mdp) VALUES (:nom, :prenom, :sexe, :age, :AdrPostale, :email, :telephone, :login, :mdp)");
        $query->bindValue(':nom', $clientData->getNom());
        $query->bindValue(':prenom', $clientData->getPrenom());
        $query->bindValue(':sexe', $clientData->getSexe());
        $query->bindValue(':age', $clientData->getAge());
        $query->bindValue(':AdrPostale', $clientData->getAdrPostale());
        $query->bindValue(':email', $clientData->getEmail());
        $query->bindValue(':telephone', $clientData->getTelephone());
        $query->bindValue(':login', $clientData->getLogin());
        $query->bindValue(':mdp', $clientData->getMdp());
        $query->execute();
    }
    
    public function addCoach(Coach $coach) {
        // Logique pour ajouter un coach à la base de données
        $stmt = $this->db->prepare("INSERT INTO coach (NomCoach, prenomCoach, sexeCoach, specialite, login, mdp, email) VALUES (:nom, :prenom, :sexe, :specialite, :login, :mdp, :email)");
    
        $stmt->bindValue(':nom', $coach->getNom());
        $stmt->bindValue(':prenom', $coach->getPrenom());
        $stmt->bindValue(':sexe', $coach->getSexe());
        $stmt->bindValue(':specialite', $coach->getSpecialite());
        $stmt->bindValue(':login', $coach->getLogin());
        $stmt->bindValue(':mdp', $coach->getMdp());
        $stmt->bindValue(':email', $coach->getEmail());
    
        $stmt->execute();
    }
    
    

    public function getAllCoaches() {
        $stmt = $this->db->query("SELECT nomCoach, prenomCoach, sexeCoach, AgeCoach, specialite, idCoach, login, mdp, email FROM coach");
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    
    public function getAllCoachesAsObjects() {
        $coachesData = $this->getAllCoaches();
        $coachObjects = [];
    
        foreach ($coachesData as $coachData) {
            $coach = new Coach(
                $coachData['login'],
                $coachData['mdp'],
                $coachData['email'],
                $coachData['idCoach'],
                $coachData['nomCoach'],
                $coachData['prenomCoach'],
                $coachData['sexeCoach'],
                $coachData['AgeCoach'],
                $coachData['specialite']
            );
    
            $coachObjects[] = $coach;
        }
    
        return $coachObjects;
    }
    


    public function getCoachById($id) {
        // Récupérer toutes les informations liées à un seul coach en fonction de son login
        $stmt = $this->db->prepare("SELECT * FROM coach WHERE idCoach = :idCoach");
        $stmt->bindValue(':idCoach', $id, PDO::PARAM_INT);  // Utilisez le paramètre reçu
        $stmt->execute();
    
        // Utilisez fetchObject() avec le nom de la classe Coach
        return $stmt->fetchObject('Coach');
    }
    
}
