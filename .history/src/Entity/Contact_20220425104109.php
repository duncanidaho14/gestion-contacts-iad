<?php

namespace App\Entity;

class Contact
{
    private $id;

    private $nom;

    private $prenom;

    private $email;

    private $adresse;

    private $telephone;

    private $age;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}