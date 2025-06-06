<?php
require_once 'autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Chenil
{
    private array $listeChiens = [];

    public function __construct()
    {
        if (!isset($_SESSION['listeChiens'])) {
            $_SESSION['listeChiens'] = [];
        }

        $this->listeChiens = $_SESSION['listeChiens'];
    }

    public function getListeChiens(){
        return $this->listeChiens;
    }


    public function ajoutChien(Chien $chien): void
    {
        $this->listeChiens[] = $chien;
        $this->sauvegarderSession();
    }

    public function supprimerChien(string $nom): void
    {
        foreach ($this->listeChiens as $key => $chien) {
            if ($chien->getNom() === $nom) {
                unset($this->listeChiens[$key]);
            }
        }
        $this->listeChiens = array_values($this->listeChiens);
        $this->sauvegarderSession();
    }

    public function majChien(string $ancienNom, string $nouveauNom, Chien $newChien): void
    {
        foreach ($this->listeChiens as $key => $chien) {
            if ($chien->getNom() === $ancienNom) {
                $newChien = new Chien(
                    $nouveauNom,
                    $newChien->getAge(),
                    $newChien->getRace(),
                    $newChien->getCouleur(),
                    $newChien->getSexe(),
                    $newChien->getPoids()
                );
                $this->listeChiens[$key] = $newChien;
            }
        }
        $this->sauvegarderSession();
    }
    public function recupererChiens(): array
    {
        $this->sauvegarderSession();
        return $this->listeChiens;
    }

    public function rechercherChien(string $nom)
    {
        foreach ($this->listeChiens as $chien) {
            if ($chien->getNom() === $nom) {
                return $chien;
            }
        }
        return null;
    }

    private function sauvegarderSession(): void
    {
        $_SESSION['listeChiens'] = $this->listeChiens;
    }
}
