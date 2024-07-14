<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\App;
use App\Core\Session;

class PaiementController extends Controller
{

    public function index()
    {
        $telephone = Session::get("client_telephone");
        $dette = Session::get("dette_id");
        $method = "paimentFromDette";
        $data =$this->model->$method($dette);
        $method = "search";
        $client = App::getInstance()->getModel("Utilisateur")->$method($telephone, $dette);
        $this->renderView("paiement.php", ["data"=>$data, "client"=>$client]);
    }
}
