<?php

require_once __DIR__ . '/Template.php';

abstract class Vue
{
    protected function debutContenu()
    {
        ob_start();
    }

    protected function afficherPage(string $titre, array $contexte = [])
    {
        $contenu = ob_get_clean();
        Template::afficher($titre, $contenu, $contexte);
    }
}