<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Dettes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .active-button {
            background-color: #3b82f6;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-100">

    <nav class="p-4">
        <div class="flex space-x-4 mb-4">
            <a href="/" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300">Clients</a>
            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300">Nouvelle Dette</button>
            <button class="active-button px-6 py-2 rounded-lg focus:outline-none transition duration-300">Voir Dette</button>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-orange-500 text-3xl font-bold">VOIR LES DETTES</h2>
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
                        <!-- <td class="py-3 px-6 text-left whitespace-nowrap">10/02/2024</td>
                            <td class="py-3 px-6 text-left">20000 f</td>
                            <td class="py-3 px-6 text-left">10000 f</td>
                            <td class="py-3 px-6 text-left"> -->
                        <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">Ajouter</button>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Voir</button>
                        </td>
                    </tr>
                    <?php foreach ($dettes as $dette) : ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap"><?php echo htmlspecialchars($dette->getDate()); ?></td>
                            <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($dette->getMontant()); ?> f</td>
                            <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($dette->getSolder()); ?> f</td>
                            <td class="py-3 px-6 text-left">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Ajouter</button>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <!-- lien pour afficher les details de la dette -->
                                <form action="/article" method="post">
                                    <input type="hidden" name="detailDette" value="<?= $dette->id ?>">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                    Voir
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <nav class="p-4">
           <div class="flex space-x-4 mb-4">
           <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300">1</button>
            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300">2</button>
            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none transition duration-300">3</button>
        </div>
    </nav>
    </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>