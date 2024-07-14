<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Dettes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-600 min-h-screen p-4">
            <h1 class="text-white text-2xl font-bold mb-6">Gestion dettes</h1>
            <ul>
                <li class="text-white mb-4">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
                </li>
                <li class="text-white mb-4">
                    <i class="fas fa-file-invoice-dollar mr-2"></i> Dettes
                </li>
                <li class="text-white mb-4">
                    <i class="fas fa-users mr-2"></i> Clients
                </li>
                <li class="text-white mb-4">
                    <i class="fas fa-box mr-2"></i> Produits
                </li>
                <li class="text-white mb-4">
                    <i class="fas fa-credit-card mr-2"></i> Paiements
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-orange-500 text-3xl font-bold">LISTE DES DETTES</h2>
                <div class="relative">
                    <input type="text" placeholder="Recherche" class="px-4 py-2 rounded-lg border border-gray-300">
                    <i class="fas fa-search absolute top-3 right-3 text-gray-500"></i>
                </div>
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Client :</label>
                        <input type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300">
                    </div>
                    <div>
                        <label class="block text-gray-700">Téléphone :</label>
                        <input type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300">
                    </div>
                    <div>
                        <label class="block text-gray-700">Statut</label>
                        <select class="w-full px-4 py-2 rounded-lg border border-gray-300">
                            <option>---</option>
                        </select>
                    </div>
                </div>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-left">Montant</th>
                            <th class="py-3 px-6 text-left">Restant</th>
                            <th class="py-3 px-6 text-left">Paiement</th>
                            <th class="py-3 px-6 text-left">Liste</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">10/02/2024</td>
                            <td class="py-3 px-6 text-left">20000 f</td>
                            <td class="py-3 px-6 text-left">10000 f</td>
                            <td class="py-3 px-6 text-left">
                                <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">Ajouter</button>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Voir</button>
                            </td>
                        </tr>
                        <!-- Repeat the above <tr> block for each row -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
