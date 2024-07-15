<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Session;
use App\Core\Validator;

class UserController extends Controller
{


    function index()
    {
        $data = [];
       /*  var_dump($data); */
        if(isset($_REQUEST["search"])){
            $method = "search";
            $data = [$this->model->$method($_REQUEST["telephone"], 0)];
            if(count($data)){
                Session::set("client", $data[0]->id);
            }
        }
        else{
            Session::unset("client");
        }
        foreach(["prenom", "nom", "email", "telephone"] as $champ){
            Session::unset($champ);

        }

        $this->renderView("index.php", $data);
    }


    public function addClient()
    {
        $error = Validator::validate($_POST, [
            "nom" => ["required", "min:3", "max:30", "alpha"],
            "prenom" => ["required", "min:3", "max:30", "alpha"],
            "email" => ["required", "email"],
            "telephone" => ["required", "phone"],
            "adresse" => ["optional"],
            // La photo est optionnelle
        ]);
        
        $client = [];
        foreach (["prenom", "nom", "email", "telephone", "adresse"] as $champ) {
            Session::set($champ, $_POST[$champ]);
            $client[$champ] = $_POST[$champ];
            if (isset($error[$champ])) {
                $error[$champ] = $error[$champ][0];
            }
        }
        
        if (!$error) {
            if ($this->model->findBy(["telephone" => $client["telephone"]])) {
                $error["telephone"] = "Le numéro de téléphone existe déjà";
            } else {
                // Gestion de l'upload de la photo
                if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                    $uploadDir ='/var/www/html/suivi_dette/public/assets/img/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    
                    if (!is_writable($uploadDir)) {
                        $error['photo'] = "Le dossier d'upload n'est pas accessible en écriture.";
                        // Logguez cette erreur ou affichez-la pour le débogage
                        error_log("Le dossier $uploadDir n'est pas accessible en écriture.");
                    }
                    $fileName = $_FILES['photo']['name'];
                    $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
                    $client['photo'] = '' . $fileName; // Chemin relatif à stocker dans la BD
                } else {
                    $error['photo'] = "Erreur lors de l'upload de la photo.";
                }
                }
    
                if (!isset($error['photo'])) {
                    $client["role_id"] = 2;
                    
                    $this->model->save($client);
                    Session::set("success_message", "Client enregistré avec succès!");
                    $this->redirect('/');
                    return;
                }
            }
        }
    
        $this->renderView("index.php", ["data" => [], "error" => $error]);
    }
}

