<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
</body>

</html>

<?php
require_once 'autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



$chenil = new Chenil();
$controller = new ChienController($chenil);
$exceptionM = new ExceptionChienForm();

$action = $_GET['action'] ?? 'ajouterForm';


switch ($action) {
    case 'ajouter':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['age'], $_POST['race'], $_POST['couleur'], $_POST['sexe'], $_POST['poids'])) {
            $nom = $_POST['nom'];
            $age = (int) $_POST['age'];
            $race = $_POST['race'];
            $couleur = $_POST['couleur'];
            $sexe = $_POST['sexe'];
            $poids = (float) $_POST['poids'];

            try {
                $exceptionM->checkValues($nom, $age, $couleur, $poids, $race, $sexe);
            } catch (Exception $e) {
                echo $e->getMessage();
                exit();
            }

            $controller->creerChien($nom, $age, $race, $couleur, $sexe, $poids);
            header('Location: index.php');
            exit;
        }
        break;

    case 'supprimer':
        if (isset($_GET['nom'])) {
            $nom = $_GET['nom'];
            $controller->supprimerChien($nom);
            header('Location: index.php');
            exit;
        }
        break;




    case 'details':
        if (isset($_GET['nom'])) {
            $nom = $_GET['nom'];
            $controller->afficherDetailsChien($nom);
        }
        break;


    case 'modifierForm':
        if (isset($_GET['nom'])) {
            $nom = $_GET['nom'];
            $chien = $controller->getChien($nom);
            require 'chienModifView.php';
        }
        break;

    default:
        $controller->afficherListeChiens();
        require 'ajoutChienView.php';
        break;

}
