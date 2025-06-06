<?php

require_once 'autoload.php';

class Chien implements Animal
{
    private string $nom;
    private int $age;
    private string $race;
    private string $sexe;
    private string $couleur;
    private float $poids;

    public function __construct(string $nom, int $age, string $race, string $couleur, string $sexe, float $poids)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->race = $race;
        $this->sexe = $sexe;
        $this->couleur = $couleur;
        $this->poids = $poids;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function getSexe(): string
    {
        return $this->sexe;
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function getPoids(): float
    {
        return $this->poids;
    }

    public function afficherDetails(): string
    {
        return "Les informations du chien {$this->nom}:\n Âge: {$this->age} ans\n Race: {$this->race}\n Sexe: {$this->sexe}\n Couleur: {$this->couleur}\n Poids: {$this->poids} kg\n";
    }

    public function getAgeEnAnneesHumaines(): int
    {
        return $this->age * 7;
    }

    public function crier(): string
    {
        if ($this->poids > 0 && $this->poids < 10) {
            return "Ouaf!";
        } elseif ($this->poids >= 10 && $this->poids <= 25) {
            return "Wouaf!!";
        } elseif ($this->poids > 25) {
            return "WOUUUAFF!";
        }
        return "Aboiement non reconnu. Vérifier le poids du chien!";
    }

    public function determinerSurpoids(): bool
    {
        return $this->poids >= 20;
    }
}