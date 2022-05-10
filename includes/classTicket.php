<?php


class Ticket{

    private $_id;
    private $_nom;
    private $_prenom;
    private $_ddn;
    private $_adresse;
    private $_mail;
    private $_telephone;

    public function __construct($id, $nom, $prenom, $ddn, $adresse, $mail, $telephone){
        $this->id = (int) $id;
        $this->nom = (string) $nom;
        $this->prenom = (string) $prenom;
        $this->ddn = (string) $ddn;
        $this->adresse = (string) $adresse;
        $this->mail = (string) $mail;
        $this->telephone = (string) $telephone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->_nom;
    }
    public function setNom($nom): self
    {
        $this->_nom = $nom;
        return $this;
    }
    public function getPrenom(): string
    {
        return $this->_prenom;
    }
    public function setPrenom($prenom): self
    {
        $this->_prenom = $prenom;
        return $this;
    }
    public function getDdn(): string
    {
        return $this->_ddn;
    }
    public function setDdn($ddn): self
    {
        $this->_ddn = $ddn;
        return $this;
    }
    public function getAdresse(): string
    {
        return $this->_adresse;
    }
    public function setAdresse($adresse): self
    {
        $this->_adresse = $adresse;
        return $this;
    }
    public function getMail(): string
    {
        return $this->_mail;
    }
    public function setMail($mail): self
    {
        $this->_mail = $mail;
        return $this;
    }
    public function getTelephone(): string
    {
        return $this->_telephone;
    }
    public function setTelephone($telephone): self
    {
        $this->_telephone = $telephone;
        return $this;
    }
}