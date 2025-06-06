<?php
echo "<h2>Détails du Chien</h2>";

if ($chien) {
    echo "<p><strong>Nom :</strong> " . $chien->getNom() . "</p>";
    echo "<p><strong>Âge :</strong> " . $chien->getAge() . " ans</p>";
    echo "<p><strong>Âge Humain :</strong>".$chien->getAgeEnAnneesHumaines()."</p>";
    echo "<p><strong>Race :</strong> " . $chien->getRace() . "</p>";
    echo "<p><strong>Couleur :</strong> " . $chien->getCouleur() . "</p>";
    echo "<p><strong>Sexe :</strong> " . $chien->getSexe() . "</p>";
    echo "<p><strong>Poids :</strong> " . $chien->getPoids() . " kg</p>";
    echo "<p><strong>Cri:</strong>".$chien->crier()."</p>";
} else {
    echo "<p>Aucun chien trouvé.</p>";
}
echo "<a href='index.php'><button>Retour</button></a>";

