<?php

class Csrf {
    
    public static function jeton(): string {
        if (!isset($_SESSION['jeton'])) {
            $_SESSION['jeton'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['jeton'];
    }

    public static function verifierValeur($valeur): bool {
        return is_string($valeur)
            && isset($_SESSION['jeton'])
            && hash_equals($_SESSION['jeton'], $valeur);
    }
}


?>