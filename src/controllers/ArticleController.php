<?php
namespace App\Controller;

use App\Core\Controller;
use App\Core\Session;
use App\Model\ArticleModel;

class ArticleController extends Controller
{
    public function details()
    {
        // Vérifier si le formulaire a été soumis via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer l'ID de la dette depuis les paramètres POST
            $detteId = $_POST['detailDette'];

            // Afficher l'ID de la dette pour vérification
            // var_dump($detteId);
            // die();
            // Récupération des articles pour l'ID de la dette correspondant
            $articleModel = new ArticleModel();
            $articles = $articleModel->getArticlesByDetteId($detteId);
            // var_dump($detteId , $articles);
            // die();

            // Rendu de la vue avec les articles récupérés
            $this->renderView("DetailDette.php", ["articles" => $articles]);
        } else {
            // Gérer le cas où la méthode de requête n'est pas POST
            echo "Erreur: la méthode de requête doit être POST.";
        }
    }
}
