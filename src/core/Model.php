<?php

namespace App\Core;


/**
 * Classe abstraite Model
 * @package App\Core
 *
 * Une classe de base pour les modèles de données.
 */
abstract class Model
{
    protected string $table;
    protected string $entityName;
    protected MysqlDatabase $database;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->table = str_replace("Model", "s",str_replace("App\Model\\", "", static::class)) ;
        $this->entityName = str_replace("Model", "Entity", static::class);
        $this->database = App::getDatabase();  
    }

    /**
     * Récupère tous les enregistrements.
     *
     * @return mixed Une collection de tous les enregistrements.
     */
    public function all(): array
    {
        return $this->database->query("SELECT * FROM {$this->table}", $this->entityName);
    }


    /**
     * Trouve un enregistrement par son identifiant.
     *
     * @param mixed $id L'identifiant de l'enregistrement à trouver.
     * @return mixed L'enregistrement trouvé ou null si aucun n'est trouvé.
     */
    public function find(int $id)
    {
        return $this->database->prepare("SELECT * FROM {$this->table} WHERE id = :id", ["id" => $id], $this->entityName, true);
    }

    /**
     * Exécute une requête personnalisée.
     *
     * @param string $sql La requête SQL à exécuter.
     * @return mixed Les résultats de la requête.
     */
    public function query(string $sql, bool $single = false)
    {
        return $this->database->query($sql, $this->entityName, $single);
    }

    /**
     * Exécute une requête personnalisée.
     *
     * @param string $sql La requête SQL à exécuter.
     * @return mixed Les résultats de la requête.
     */
    public function prepare(string $sql, array $data, string $entityName = null, bool $single = false) {
        if ($entityName == null) {
            $entityName = $this->entityName;
        }

        return $this->database->prepare($sql, $data, $entityName, $single);
    }

    

    /**
     * Sauvegarde l'enregistrement actuel.
     *
     * @return bool True si la sauvegarde a réussi, false sinon.
     */
    public function save(array $data) {
        if (isset($data['id']) && !empty($data['id'])) {
            $id = $data['id'];
            unset($data['id']);
            $sql = "UPDATE {$this->table} SET " . $this->buildUpdatePlaceholders($data) . " WHERE id = :id";
            $data['id'] = $id;
        } else {
           
            $sql = "INSERT INTO {$this->table} (" . implode(', ', array_keys($data)) . ") VALUES (" . $this->buildPlaceholders($data) . ")";
        }

        $params = [];
        foreach ($data as $key => $value) {
            $params[":$key"] = $value;
        }
        var_dump($sql);
        // Debugging
        echo "Generated SQL Query:\n";
        var_dump($sql);
        echo "Parameters:\n";
        var_dump($params);

        $result = $this->prepare($sql, $params, $this->entityName);

        if ($result === false) {
            echo "Prepare failed: ";
           /*  var_dump($this->database->errorInfo()); */
        }

        return $result;
    }

    private function buildPlaceholders(array $data): string {
        return implode(', ', array_map(function($key) {
            return ":$key";
        }, array_keys($data)));
    }

    private function buildUpdatePlaceholders(array $data): string {
        return implode(', ', array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));
    }
    

    /**
     * Construit les marqueurs de position pour une requête SQL INSERT.
     *
     * @param array $data Données à insérer.
     * @return string Marqueurs de position pour une requête INSERT.
     */
  


    /**
     * Supprime un enregistrement en base de données.
     *
     * @param int $id Identifiant de l'enregistrement à supprimer.
     * @return bool Succès de l'opération.
     */
    public function delete($id)
    {
        return $this->database->prepare("DELETE FROM {$this->table} WHERE id = :id", ["id" => $id]);
    }

    /**
     * Définit la base de données utilisée par le modèle.
     *
     * @param mixed $database La base de données à utiliser.
     * @return void
     */
    public function setDataBase(MysqlDatabase $database)
    {
        $this->database = $database;
    }

    /**
     * Met à jour l'enregistrement actuel.
     *
     * @return bool True si la mise à jour a réussi, false sinon.
     */
    public function update($data)
    {
        return $this->database->prepare("UPDATE {$this->table} SET " . $this->buildSetClause($data) . " WHERE id = ?", array_values($data), $this->entityName);
    }

    public function buildSetClause($data){
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }
        return implode(', ', $set);
    }

    /**
     * Recherche un enregistrement par des critères spécifiques.
     *
     * @param array $criteria Critères de recherche (par exemple ['name' => 'John']).
     * @return mixed|null Objet de la classe appelante ou null si non trouvé.
     */
    public function findBy(array $criteria) {
        // Construction des conditions SQL
        $conditions = $this->buildConditions($criteria);
    
        // Debugging
        // var_dump($conditions); // Affiche les conditions générées pour débogage
    // die();
        // Préparation et exécution de la requête
        $result = $this->database->prepare(
            "SELECT * FROM {$this->table} WHERE $conditions",
            $criteria,
            $this->entityName,
            true
        );
    
        return $result;
    }


    /**
     * Construit la clause WHERE pour une requête SQL en fonction des critères.
     *
     * @param array $criteria Critères de recherche.
     * @return string Clause WHERE pour une requête SQL.
     */
    private function buildConditions(array $criteria): string
    {
        $conditions = [];
        foreach ($criteria as $key => $value) {
            $conditions[] = "$key = :$key";
        }
        return implode(' AND ', $conditions);
    }


    /**
     * Supprime des enregistrements basés sur des critères spécifiques.
     *
     * @param array $criteria Critères de suppression (par exemple ['status' => 'inactive']).
     * @return bool Succès de l'opération.
     */
    public function deleteBy(array $criteria): bool
    {
        $conditions = $this->buildConditions($criteria);
        return $this->database->prepare("DELETE FROM {$this->table} WHERE $conditions", $criteria);
    }
}