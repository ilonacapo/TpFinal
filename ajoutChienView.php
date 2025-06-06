<?php
echo "<h3>Ajouter un Chien</h3>";

echo "<form method='POST' action='index.php?action=ajouter'>";

echo "<label for='nom'>Nom du chien:</label><input type='text' id='nom' name='nom' required>";
echo "<label for='sexe'>Sexe:</label><input type='text' id='sexe' name='sexe' required>";
echo "<label for='couleur'>Couleur :</label><input type='text' id='couleur' name='couleur' required>";
echo "<label for='age'>Âge:</label><input type='number' id='age' name='age' required>";
echo "<label for='race'>Race:</label><input type='text' id='race' name='race' required>";
echo "<label for='poids'>Poids:</label><input type='number' id='poids' name='poids' required>";

echo "<button type='submit'>Ajouter</button>";
echo "</form>";
