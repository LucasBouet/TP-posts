<?php 
// function limitOutput($text, $maxLength) {
//     if (strlen($text) <= $maxLength) {
//         return $text;
//     }
//     return substr($text, 0, $maxLength) . '...';
// }

// $posts = [
//     [
//         'id' => 1,
//         'title' => 'Premier Post',
//         'picture' => 'post1.jpg',
//         'content' => 'Ceci est le contenu du premier post.',
//         'created_at' => '2024-01-15 10:00:00',
//         'is_published' => true,
//     ],
//     [
//         'id' => 2,
//         'title' => 'Deuxième Post',
//         'picture' => 'post2.jpg',
//         'content' => 'Ceci est le contenu du deuxième post.',
//         'created_at' => '2024-02-20 14:30:00',
//         'is_published' => true,
//     ],
//     [
//         'id' => 3,
//         'title' => 'Troisième Post',
//         'picture' => 'post3.jpg',
//         'content' => 'Ceci est le contenu du troisième post.',
//         'created_at' => '2024-03-05 09:15:00',
//         'is_published' => false,
//     ],
//     [
//         'id' => 4,
//         'title' => 'Quatrieme Post',
//         'picture' => 'post3.jpg',
//         'content' => 'Ceci est le contenu du quatrieme post.',
//         'created_at' => '2024-02-20 14:30:00',
//         'is_published' => true,
//     ],
//     [
//         'id' => 5,
//         'title' => 'Cinquieme Post',
//         'picture' => 'post1.jpg',
//         'content' => 'Ceci est le contenu du cinquieme post.',
//         'created_at' => '2024-03-05 09:15:00',
//         'is_published' => true,
//     ],
//     [
//         'id' => 6,
//         'title' => 'Sixieme Post',
//         'picture' => 'post2.jpg',
//         'content' => 'Ceci est le contenu du sixieme post.',
//         'created_at' => '2024-02-20 14:30:00',
//         'is_published' => false,
//     ],
//     [
//         'id' => 7,
//         'title' => 'Septieme Post',
//         'picture' => 'post2.jpg',
//         'content' => 'Ceci est le contenu du Septieme post.',
//         'created_at' => '2024-03-05 09:15:00',
//         'is_published' => true,
//     ],
// ];
?>
<main class="max-w-6xl mx-auto mt-16 p-6 flex flex-col gap-12">

    <form method="POST" class="bg-white/80 backdrop-blur-lg p-6 rounded-2xl shadow-lg border border-blue-100">
        <input type="hidden" name="csrf" value="<?= $csrfToken ?>">
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
                        <?php if (!$post['is_published']): ?>
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="p-3"><?= htmlspecialchars($post['id']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($post['title']) ?></td>
                                <td class="p-3"><?= limitOutput(htmlspecialchars($post['content']), 200) ?></td>
                                <td class="p-3">
                                    <button
                                        class="cursor-pointer px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition"
                                        formaction="/admin?accept=<?= urlencode($post['id']) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                        </svg>

                                    </button>
                                </td>
                                <td class="p-3">
                                    <button
                                        class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                                        formaction="/admin?delete=<?= urlencode($post['id']) ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                    </button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>

    <form method="POST" class="bg-white/80 backdrop-blur-lg p-6 rounded-2xl shadow-lg border border-blue-100">
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
                            <td class="p-3"><?= limitOutput(htmlspecialchars($post['content']), 200) ?></td>
                            <td class="p-3">
                                <button
                                    type="submit"
                                    class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                                    formaction="/admin?delete=<?= urlencode($post['id']) ?>">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>

</main>
