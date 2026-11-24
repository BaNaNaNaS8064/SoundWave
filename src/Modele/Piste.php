<?php

class Piste{
	private int $id_piste;
	private string $titre;
	private ?string $description;
	private string $fichier_audio;
	private int $nombre_ecoutes;
	private string $nom_genre;
	private string $date_publication;
	private ?string $nom_artiste;
	private ?string $nom_groupe;

	public function __construct(int $id, string $titre, ?string $description, int $fichier_audio, int $nombre_ecoutes, string $nom_genre, string $date_publication, ?string $nom_artiste, ?string $nom_groupe)
	{
		$this->id_piste = $id;
		$this->titre = $titre;
		$this->description = $description;
		$this->fichier_audio = $fichier_audio;
		$this->nombre_ecoutes = $nombre_ecoutes;
		$this->nom_genre = $nom_genre;
		$this->date_publication = $date_publication;
		$this->nom_artiste = $nom_artiste;
		$this->nom_groupe = $nom_groupe;
	}

	public static function origin(array $pisteArray): self {
        return new self($pisteArray["id"], $pisteArray["titre"], $pisteArray["description"], $pisteArray["fichier_audio"], $pisteArray["nombre_ecoutes"], $pisteArray["nom_genre"], $pisteArray["date_publication"], $pisteArray["nom_artiste"], $pisteArray["nom_groupe"]);
    }

	public function getId_piste(): int {
		return $this->id_piste;
	}
	public function getTitre(): string {
		return $this->titre;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function getFichier_audio(): string {
		return $this->fichier_audio;
	}
	public function getNombre_ecoutes(): int {
		return $this->nombre_ecoutes;
	}
	public function getNom_genre(): string {
		return $this->nom_genre;
	}
	public function getDate_publication(): string {
		return $this->date_publication;
	}
	public function getNom_artiste(): ?string {
		return $this->nom_artiste;
	}
	public function getNom_groupe(): ?string {
		return $this->nom_groupe;
	}
}