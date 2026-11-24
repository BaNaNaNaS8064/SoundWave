<?php

require_once __DIR__ . '/../BDD.php'; 

class PisteModele
{
    public function dernieresPistes()
    {
        $pdo = BDD::getConnexion(); 
        $sql = "SELECT
                    p.id_piste,
                    p.titre,
                    p.description,
                    p.fichier_audio,
                    p.nombre_ecoutes,
                    p.nom_genre,
                    p.date_publication,
                    m.nom AS nom_artiste,
                    g.nom AS nom_groupe
                FROM Piste p
                LEFT JOIN Membre m ON p.id_membre = m.id_membre
                LEFT JOIN Groupe g ON p.id_groupe = g.id_groupe
                ORDER BY p.date_publication DESC, p.id_piste DESC";
        $requete = $pdo->query($sql); 
        return $requete->fetchAll(PDO::FETCH_ASSOC); 
    }
}


?>