<?php

namespace App\Model;

use App\Core\MysqlDatabase;
use App\Entity\ArticleEntity;
use App\Entity\DetteEntity;
use App\Core\Model;

class ArticleModel extends Model
{
    public function __construct()
    {
        parent::__construct();
         
    }

    
    public function getArticlesByDetteId(int $detteId): array
{
    $query = "
    SELECT 
        a.libelle, 
        a.prixUnitaire, 
        d.quantite, 
        (a.prixUnitaire * d.quantite) AS montant
    FROM 
        DetailsDettes d
    INNER JOIN 
        Articles a 
    ON 
        d.article_id = a.id
    WHERE 
        d.dette_id = :dette_id
    ";

    return $this->prepare($query, ['dette_id' => $detteId]);
}

}
