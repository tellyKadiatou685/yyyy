<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Session;
use App\Model\DetteModel;

class DetteController extends Controller
{
    // public function afficherDettesParClient(int $clientId)
    // {
    //     $detteModel = new DetteModel();
    //     $dettes = $detteModel->findBy(['client_id' => $clientId]);

    //     // Affichage dans la vue
    //     include '/var/www/html/suivi_dette/views/dette.php';
    // }


    public function index() {

        $dettes = $this->model->findBy(["client_id"=>Session::get("client")], false);
        $this->renderView("dette.php", ["dettes"=>$dettes]);        
    }
}
