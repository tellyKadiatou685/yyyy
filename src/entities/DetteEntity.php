<?php


/**
 * Classe représentant une entité de client.
 */
namespace App\Entity;

use App\Core\Entity;

/**
 * Classe représentant une entité de dette.
 */
class DetteEntity extends Entity
{
    protected int $id;
    protected int $client_id;
    protected int $vendeur_id;
    protected float $montant;
    protected int $solder;
    protected string $date;

    // Getters and Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    public function getVendeurId(): int
    {
        return $this->vendeur_id;
    }

    public function setVendeurId(int $vendeur_id): self
    {
        $this->vendeur_id = $vendeur_id;
        return $this;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    public function getSolder(): int
    {
        return $this->solder;
    }

    public function setSolder(int $solder): self
    {
        $this->solder = $solder;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }
}
