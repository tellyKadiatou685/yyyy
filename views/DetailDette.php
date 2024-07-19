<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Articles de la Dette</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto mt-10">
        <!-- <h1 class="text-2xl font-bold mb-5">Articles pour la Dette ID: <?= htmlspecialchars($_GET['dette_id']) ?></h1> -->
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">ARTICLE</th>
                    <th class="py-3 px-6 text-left">PRIX</th>
                    <th class="py-3 px-6 text-left">QUANTITÉ</th>
                    <th class="py-3 px-6 text-left">MONTANT</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php if (!empty($articles)) : ?>
                    <?php foreach ($articles as $article) : ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap"><?= htmlspecialchars($article->getLibelle()) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($article->getPrixUnitaire()) ?> f</td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($article->getQuantite()) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($article->getMontant()) ?> f</td>
                        </tr>

                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center">Aucun article trouvé pour cette dette.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>