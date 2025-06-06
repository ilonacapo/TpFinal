<?php

class ExceptionChienForm extends Exception {

public function checkCouleur(string $couleur) {
    $couleursValides = ["noir", "blanc", "marron", "gris", "roux", "tigré"];
    if (!in_array(strtolower($couleur), $couleursValides)) {
        return false;
    }
    return true;
}
    public function checkValues(string $nom, int $age, string $couleur, float $poids, string $race, string $sexe) {
        if (empty($nom) || empty($race) || empty($couleur) || empty($sexe) || empty($poids)) {
            throw

            new Exception("Vous devez remplir tous les champs!\n");
            } else if ($age < 0 || $poids <= 0) {
                throw new Exception("Le poids et l'âge doivent être positifs\n");
            } else if (strtolower($sexe) != "masculin" && strtolower($sexe) != "feminin") {
                throw new Exception("Les valeurs acceptées pour le sexe sont: Feminin ou Masculin");
            } else if ($this->checkCouleur($couleur) == false) {
                $message = "La couleur doit être soit : Noir, Blanc, Marron, Gris, Roux, Tigré.\n";
                throw new Exception($message);
            }
    }
}