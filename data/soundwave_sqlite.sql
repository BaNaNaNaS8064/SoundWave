BEGIN TRANSACTION;
CREATE TABLE AppartientGroupe (
    id_membre INTEGER NOT NULL,
    id_groupe INTEGER NOT NULL,
    PRIMARY KEY (id_membre, id_groupe),
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe) ON DELETE CASCADE
);
CREATE TABLE Commentaire (
    id_commentaire INTEGER PRIMARY KEY AUTOINCREMENT,
    contenu TEXT NOT NULL,
    id_membre INTEGER NOT NULL,
    id_piste INTEGER NOT NULL,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_piste) REFERENCES Piste(id_piste) ON DELETE CASCADE
);
CREATE TABLE ContientPiste (
    id_playlist INTEGER NOT NULL,
    id_piste INTEGER NOT NULL,
    PRIMARY KEY (id_playlist, id_piste),
    FOREIGN KEY (id_playlist) REFERENCES Playlist(id_playlist) ON DELETE CASCADE,
    FOREIGN KEY (id_piste) REFERENCES Piste(id_piste) ON DELETE CASCADE
);
CREATE TABLE Genre (
    nom_genre TEXT PRIMARY KEY
);
CREATE TABLE Groupe (
    id_groupe INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    id_createur INTEGER NOT NULL,
    FOREIGN KEY (id_createur) REFERENCES Membre(id_membre) ON DELETE CASCADE
);
CREATE TABLE LikerPiste (
    id_membre INTEGER NOT NULL,
    id_piste INTEGER NOT NULL,
    PRIMARY KEY (id_membre, id_piste),
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_piste) REFERENCES Piste(id_piste) ON DELETE CASCADE
);
CREATE TABLE Membre (
    id_membre INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    mot_de_passe TEXT NOT NULL,
    role TEXT DEFAULT 'Membre' CHECK(role IN ('Visiteur', 'Membre', 'Administrateur'))
);
CREATE TABLE Piste (
    id_piste INTEGER PRIMARY KEY AUTOINCREMENT,
    titre TEXT NOT NULL,
    description TEXT,
    fichier_audio TEXT NOT NULL, 
    nombre_ecoutes INTEGER DEFAULT 0,
    nom_genre TEXT NOT NULL,
    id_membre INTEGER DEFAULT NULL, 
    id_groupe INTEGER DEFAULT NULL, 
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nom_genre) REFERENCES Genre(nom_genre) ON DELETE RESTRICT,
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe) ON DELETE CASCADE
);
CREATE TABLE Playlist (
    id_playlist INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    id_membre INTEGER NOT NULL,
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE
);
CREATE TABLE PossedeTag (
    id_piste INTEGER NOT NULL,
    nom_tag TEXT NOT NULL,
    PRIMARY KEY (id_piste, nom_tag),
    FOREIGN KEY (id_piste) REFERENCES Piste(id_piste) ON DELETE CASCADE,
    FOREIGN KEY (nom_tag) REFERENCES Tag(nom_tag) ON DELETE CASCADE
);
CREATE TABLE SignalerCommentaire (
    id_membre INTEGER NOT NULL,
    id_commentaire INTEGER NOT NULL,
    raison TEXT NOT NULL,
    date_signalement DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_membre, id_commentaire),
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_commentaire) REFERENCES Commentaire(id_commentaire) ON DELETE CASCADE
);
CREATE TABLE SignalerPiste (
    id_membre INTEGER NOT NULL,
    id_piste INTEGER NOT NULL,
    raison TEXT NOT NULL,
    date_signalement DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_membre, id_piste),
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre) ON DELETE CASCADE,
    FOREIGN KEY (id_piste) REFERENCES Piste(id_piste) ON DELETE CASCADE
);
CREATE TABLE Tag (
    nom_tag TEXT PRIMARY KEY
);
CREATE TABLE sqlite_sequence(name,seq);
COMMIT;
