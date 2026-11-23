<?php

session_start();

require_once __DIR__ . '/../src/BDD.php';
require_once __DIR__ . '/../src/Controleur/PisteControleur.php';

try {
    BDD::getConnexion();
} catch (PDOException $e) {
    http_response_code(500);
    die('Erreur de connexion à la base de données');
}

$module = isset($_GET['module']) ? $_GET['module'] : 'piste';
$action = isset($_GET['action']) ? $_GET['action'] : 'liste';

if ($module === 'piste' && $action === 'liste') {
    $modele = new PisteModele();
    $controleur = new PisteControleur($modele);
    $controleur->liste();
} else {
    http_response_code(404);
    echo 'Page introuvable';
}