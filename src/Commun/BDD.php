<?php

abstract class BDD {

    protected static ?PDO $pdo = null;

    public function __construct() {

        $sqlitePath = __DIR__ . '/../../data/soundwave.sqlite';

        if (file_exists($sqlitePath)) {
            if (self::$pdo === null) {

                self::$pdo = new PDO('sqlite:' . $sqlitePath);
                self::$pdo->exec('PRAGMA foreign_keys = ON');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
        else
            die('Chemin du fichir sqlite incorrect : ' . $sqlitePath);
    }
}
?>