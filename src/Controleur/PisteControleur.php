<?php

require_once __DIR__ . '/../Modele/PisteModele.php'; 
require_once __DIR__ . '/../Vue/PisteListeVue.php';

class PisteControleur
{
    private $modele; 

    public function __construct(PisteModele $modele)
    {
        $this->modele = $modele; 
    }

    public function liste()
    {
        $pistes = $this ->modele->dernieresPistes(); 
        $vue = new PisteListeVue(); 
        $vue -> afficher($pistes); 
    }
}


?>