<?php

namespace App\Model;

use App\Core\Model;

class DetteModel extends Model 
{
    public function __construct()
    {
        parent::__construct();
        
        // $this->table = 'Dettes';  // Assurez-vous que le nom de la table est correct
        // $this->entityName = 'App\Entity\Dette';  // Assurez-vous que le nom de l'entité est correct
    }

    /**
     * Récupère toutes les dettes pour un client donné.
     *
     * @param int $clientId Identifiant du client.
     * @return array Tableau d'objets Dette.
     */
    public function getDettesByClientId(int $clientId): array
    {
        return $this->prepare("SELECT * FROM {$this->table} WHERE client_id = :client_id", ['client_id' => $clientId]);
    }
    

    
}
