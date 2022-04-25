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

    public function setPrenom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}