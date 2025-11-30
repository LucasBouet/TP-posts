<?php 
function limitOutput($text, $maxLength) {
    if (strlen($text) <= $maxLength) {
        return $text;
    }
    // Note: Utiliser '...' pour indiquer que le contenu a été coupé.
    return substr($text, 0, $maxLength) . '...';
}

// Les données $posts doivent être fournies par votre contrôleur (elles sont commentées ici pour l'exemple)
// $posts = [ ... ]; 
?>
<main class="max-w-6xl mx-auto mt-16 p-6 flex flex-col gap-12">

    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-2xl shadow-lg border border-blue-100">
        <h2 class="text-xl font-bold text-blue-700 mb-4">Posts en attente de validation</h2>

        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full border-collapse">
                <thead class="bg-blue-100/60">
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">ID</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Titre</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Contenu</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Accepter</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Refuser</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-blue-100">
                    <?php foreach ($posts as $post): ?>
                        <?php 
                        // Note: J'ai retiré le form englobant ici, 
                        // et j'ai supposé que le $csrfToken est disponible si nécessaire.
                        // Cependant, l'utilisation de la méthode GET était peu sécurisée pour le CSRF.

                        // Afficher uniquement les posts non publiés
                        if (!$post['is_published']): 
                        ?>
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="p-3"><?= htmlspecialchars($post['id']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($post['title']) ?></td>
                                <td class="p-3"><?= limitOutput(htmlspecialchars($post['description']), 100) ?></td>
                                
                                <td class="p-3">
                                    <form method="POST" action="/admin" class="inline-block">
                                        <input type="hidden" name="action" value="accept">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
                                        <?php if (isset($csrfToken)): ?>
                                            <input type="hidden" name="csrf" value="<?= $csrfToken ?>">
                                        <?php endif; ?>
                                        
                                        <button type="submit"
                                            class="cursor-pointer px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                
                                <td class="p-3">
                                    <form method="POST" action="/admin" class="inline-block">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
                                        <?php if (isset($csrf)): ?>
                                            <input type="hidden" name="csrf" value="<?= $csrf ?>">
                                        <?php endif; ?>
                                        
                                        <button type="submit"
                                            class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    ---

    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-2xl shadow-lg border border-blue-100">
        <h2 class="text-xl font-bold text-blue-700 mb-4">Tous les posts</h2>

        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full border-collapse">
                <thead class="bg-blue-100/60">
                    <tr>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">ID</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Titre</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Contenu</th>
                        <th class="p-3 text-left text-sm font-semibold text-slate-700">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-blue-100">
                    <?php foreach ($posts as $post): ?>
                        <tr class="hover:bg-blue-50/50 transition">
                            <td class="p-3"><?= htmlspecialchars($post['id']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($post['title']) ?></td>
                            <td class="p-3"><?= limitOutput(htmlspecialchars($post['description']), 100) ?></td>
                            
                            <td class="p-3">
                                <form method="POST" action="/admin">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
                                    <?php if (isset($csrf)): ?>
                                        <input type="hidden" name="csrf" value="<?= $csrf ?>">
                                    <?php endif; ?>

                                    <button type="submit"
                                        class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>