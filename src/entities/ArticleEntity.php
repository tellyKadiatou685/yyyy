<?php

namespace App\Entity;

class ArticleEntity
{
    private $id;

    private $libelle;


    private $detteId;
    // private $article;

    private $prixUnitaire;


    private $quantite;


    private $montant;



    // public function __construct(array $data) {
    //     $this->id = $data['id'] ?? null;
    //     $this->detteId = $data['dette_id'] ?? null;
    //     $this->article = $data['libelle'] ?? null;
    //     $this->prix = $data['prixUnitaire'] ?? null;
    //     $this->quantite = $data['quantite'] ?? null;
    //     $this->montant = $data['montant'] ?? null;
    // }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getDetteId()
    {
        return $this->detteId;
    }
    // public function getArticle()
    // {
    //     return $this->article;
    // }
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }

    public function getMontant()
    {
        return $this->montant;
    }
    public function getLibelle()
    {
        return $this->libelle;
    }
}
