<?php
require_once 'autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class ChienController {
    private Chenil $chenil;

    public function __construct(Chenil $chenil) {
        $this->chenil = $chenil;
    }

    public function getChenil(): Chenil {
        return $this->chenil;
    }

    public function getChien(string $nom): ?Chien {
        return $this->chenil->rechercherChien($nom);
    }
  
    public function afficherListeChiens(): void {
        $listeChiens = $this->chenil->recupererChiens();

        if (empty($listeChiens)) {
            echo "<p>Pas de chien dans la liste</p>";
        } else {
            require 'listeChiensView.php';
        }
    }

    public function afficherDetailsChien(string $nom): void {
        $chien = $this->chenil->rechercherChien($nom);
        require 'chienDetailsView.php';
    }

    public function creerChien(string $nom, int $age, string $race, string $couleur, string $sexe, float $poids): void {
        if (empty($nom) || empty($race) || empty($couleur) || empty($sexe) || $age < 0 || $poids < 0) {
            echo "Erreur : Veuillez entrer des informations valides.";
            return;
        }

        $chien = new Chien($nom, $age, $race, $couleur, $sexe, $poids);
        $this->chenil->ajoutChien($chien);
        header('Location: index.php');
        exit;
    }

public function modifierChien(string $ancienNom, string $nouveauNom, int $age, string $race, string $couleur, string $sexe, float $poids): void {
    $nouveauChien = new Chien($nouveauNom, $age, $race, $couleur, $sexe, $poids);
    $this->chenil->majChien($ancienNom, $nouveauNom, $nouveauChien);
    header('Location: index.php');
    exit;
}

    public function supprimerChien(string $nom): void {
        $this->chenil->supprimerChien($nom);
        header('Location: index.php');
        exit;
    }
}
