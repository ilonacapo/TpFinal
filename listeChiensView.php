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
echo "<h2>Liste des Chiens</h2>";

if (empty($listeChiens)) {
    echo "<p>Aucun chien trouvé.</p>";
} else {
    echo "<ul>";
    foreach ($listeChiens as $chien) {
        $nomChien = $chien->getNom();
echo "<li>
        {$nomChien}
        <a href='index.php?action=details&nom={$nomChien}'><button>Détails</button></a> 
        <a href='index.php?action=modifierForm&nom={$nomChien}'><button>Modifier</button></a> 
        <a href='index.php?action=supprimer&nom={$nomChien}' onclick='return confirm(\"Supprimer {$nomChien} ?\")'><button>Supprimer</button></a>
      </li>";

    }
    echo "</ul>";
}
?>
