<?php 
// var_dump($data);die;

use App\Core\Session;

$data = isset($data) && count($data)?$data[0]:null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi Dette</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <!-- <div class="w-64 bg-blue-600 text-white p-6">
            <h1 class="text-2xl font-bold mb-8">Gestion dettes</h1>
            <nav>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <button><span>Tableau de bord</span></button>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <button><span>Dettes</span></button>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <button><span>Clients</span></button>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <Button><span>Produits</span></Button>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <button><span>Paiements</span></button>
                    </li>
                </ul>
            </nav>
        </div> -->

                <!-- Main Content -->
                <div class="flex-1 flex flex-col">
            <!-- <header class="bg-blue-600 shadow-md rounded-lg p-4 flex ml-5 justify-between items-center">
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-md hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 rounded-full border focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </button>
            </header> -->
            
            <!-- Formulaire de gauche -->
    
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="flex justify-center items-center min-h-screen p-4">
        <div class="bg-gray-300 p-8 rounded-lg shadow-md flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-8 w-full max-w-6xl">
            <!-- Section gauche -->
            <div class="w-full md:w-1/2 bg-gray-400 p-6 rounded-lg">
                <h2 class="text-black font-semibold mb-4">NOUVEAU</h2>
                <form method="post" action="/add-client" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="nom" class="block text-black mb-2">Nom</label>
                        <input type="text" id="nom" name="nom" class="w-full px-3 py-2 rounded-lg" placeholder="Nom" value="<?=Session::isset("nom")?Session::get("nom"):""?>">
                        <div class="text-red-600 min-h-6"><?=isset($error["nom"])?$error["nom"]:""?></div>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block text-black mb-2">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="w-full px-3 py-2 rounded-lg" placeholder="Prénom" value="<?=Session::isset("prenom")?Session::get("prenom"):""?>">
                        <div class="text-red-600 min-h-6"><?=isset($error["prenom"])?$error["prenom"]:""?></div>
                    </div>
                    <div class="mb-4">
                        <label for="adresse" class="block text-black mb-2">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="w-full px-3 py-2 rounded-lg" placeholder="Adresse" value="<?=Session::isset("adresse")?Session::get("adresse"):""?>">
                        <div class="text-red-600 min-h-6"><?=isset($error["adresse"])?$error["adresse"]:""?></div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-black mb-2">E-mail</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 rounded-lg" placeholder="Email" value="<?=Session::isset("email")?Session::get("email"):""?>">
                        <div class="text-red-600 min-h-6"><?=isset($error["email"])?$error["email"]:""?></div>
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block text-black mb-2">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" class="w-full px-3 py-2 rounded-lg" placeholder="Téléphone" value="<?=Session::isset("telephone")?Session::get("telephone"):""?>">
                        <div class="text-red-600 min-h-6"><?=isset($error["telephone"])?$error["telephone"]:""?></div>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-black mb-2">Photo</label>
                        <input type="file" id="photo" name="photo" class="w-full px-3 py-2 rounded-lg">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">Enregistrer</button>
                    </div>
                </form>
            </div>

            <!-- Section droite -->
            <div class="w-full md:w-1/2 bg-gray-300 p-6 rounded-lg">
                <h2 class="text-black font-semibold mb-4">SUIVI DETTES</h2>
                <form method="post" action="/" class="mb-4">
                    <div class="flex mb-4">
                        <input type="tel" name="telephone" class="w-full px-3 py-2 rounded-lg" placeholder="Téléphone" value="<?=$data?$data->telephone:""?>">
                        <button name="search" type="submit" class="bg-blue-600 text-white ml-2 px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">Ok</button>
                    </div>
                </form>
                <div class="bg-gray-100 p-4 rounded-lg mb-4">
                    <div class="flex space-x-2 mb-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">Clients</button>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">Nouvelle Dette</button>
                        <a href="./dette.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">Voir Dette</a>
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="w-24 h-24 bg-gray-300 rounded-lg flex-shrink-0 overflow-hidden">
                            <img src="http://www.dettes.com:8082/assets/img/<?=$data?$data->photo:""?>" alt="" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <div class="text-gray-700">Nom : <?=$data?$data->nom:""?></div>
                            <div class="text-gray-700">Prénom : <?=$data?$data->prenom:""?></div>
                            <div class="text-gray-700">Email : <span class="text-blue-600 underline"><?=$data?$data->email:""?></span></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="text-gray-700">Total Dette : <?=$data?$data->montant:""?></div>
                    <div class="text-gray-700 mt-2">Montant Versé : <?=$data?$data->montantVerser:""?></div>
                    <div class="text-gray-700 mt-2">Montant Restant : <?=$data?$data->montantRestant:""?></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>