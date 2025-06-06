<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?php
require_once 'autoload.php';
echo "<form method='POST' action='index.php?action=modifier'>";
echo "<input type='hidden' name='ancienNom' value='" . $chien->getNom() . "'>";
echo "<label for='nouveauNom'>Nouveau Nom :</label>";
echo "<input type='text' id='nouveauNom' name='nouveauNom' value='" . $chien->getNom() . "' required>";
echo "<input type='number' name='age' value='" . $chien->getAge() . "' required>";
echo "<input type='text' name='race' value='" . $chien->getRace() . "' required>";
echo "<input type='text' name='couleur' value='" . $chien->getCouleur() . "' required>";
echo "<input type='text' name='sexe' value='" . $chien->getSexe() . "' required>";
echo "<input type='number' name='poids' value='" . $chien->getPoids() . "' required>";
echo "<button type='submit'>Modifier</button>";
echo "</form>";

