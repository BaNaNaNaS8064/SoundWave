<?php
require_once __DIR__ . '/Xss.php';
class Template{
	public static function afficher(string $titre, string $contenu, array $contexte = []){
		require __DIR__ . '/templates/page.php';
	}
}