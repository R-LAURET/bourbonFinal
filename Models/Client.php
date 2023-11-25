<?php

class Client  {
    protected $login;
    protected $mdp;
    protected $telephone;
    protected $email;
    protected $nom;
    protected $prenom;
    protected $sexe;
    protected $age;
    protected $AdrPostale;
    
    public function __construct($login, $mdp,$telephone, $email, $nom, $prenom, $sexe, $age, $AdrPostale) {
        $this->login = $login;
        $this->mdp = $mdp;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->age = $age;
        $this->AdrPostale = $AdrPostale;
        
    }
    
    public function getLogin() {
        return $this->login;
    }
    
    public function getMdp() {
        return $this->mdp;
    }
    
    public function getTelephone() {
        return $this->telephone;
    }
    public function getEmail() {
        return $this->email;
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
    
    public function getAdrPostale() {
        return $this->AdrPostale;
    }

    public function setLogin($login) {
        $this->login = $login;
    }
    
    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
    
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setNom($nom) {
        return $this->nom;
    }
    
    public function setPrenom($prenom) {
        return $this->prenom;
    }
    
    public function setSexe($sexe) {
        return $this->sexe;
    }
    
    public function setAge($age) {
        return $this->age;
    }
    
    public function setAdrPostale($AdrPostale) {
        return $this->AdrPostale;
    }

}
