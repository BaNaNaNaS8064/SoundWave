<?php

session_start();

require_once __DIR__ . '/../src/Vue/PisteListeVue.php';
require_once __DIR__ . '/../src/Modele/PisteRepository.php';
require_once __DIR__ . '/../src/Controleur/PisteControleur.php';

$module = isset($_GET['module']) ? $_GET['module'] : 'piste';
$action = isset($_GET['action']) ? $_GET['action'] : 'liste';

if ($module === 'piste' && $action === 'liste') {
    $repo = new PisteRepository();
    $vue = new PisteListeVue();
    $controleur = new PisteControleur($repo, $vue);
    $controleur->liste();
} else {
    http_response_code(404);
    echo 'Page introuvable';
}

?>