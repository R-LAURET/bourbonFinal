<?php
class Coach  {
    protected $login;
    protected $mdp;
    protected $email;
    protected $id;
    protected $nom;
    protected $prenom;
    protected $sexe;
    protected $age;
    protected $specialite;

    public function __construct($login, $mdp, $email, $id, $nom, $prenom, $sexe, $age, $specialite) {
        $this->login = $login;
        $this->mdp = $mdp;
        $this->email = $email;
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->age = $age;
        $this->specialite = $specialite;
    }
    public function getLogin() {
        return $this->login;
    }
    public function getMdp() {
        return $this->mdp;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getId(){
        return $this->id;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function getSexe() {
        return $this->sexe;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function getSpecialite() {
        return $this->specialite;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }
    
    public function setAge($age) {
        $this->age = $age;
    }
    
    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
}
