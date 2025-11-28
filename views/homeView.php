<?php

$posts = [
    [
        'id' => 1,
        'title' => 'Premier Post',
        'picture' => 'post1.jpg',
        'content' => 'Ceci est le contenu du premier post.',
        'created_at' => '2024-01-15 10:00:00',
        'is_published' => true,
    ],
    [
        'id' => 2,
        'title' => 'Deuxième Post',
        'picture' => 'post2.jpg',
        'content' => 'Ceci est le contenu du deuxième post.',
        'created_at' => '2024-02-20 14:30:00',
        'is_published' => true,
    ],
    [
        'id' => 3,
        'title' => 'Troisième Post',
        'picture' => 'post3.jpg',
        'content' => 'Ceci est le contenu du troisième post.',
        'created_at' => '2024-03-05 09:15:00',
        'is_published' => true,
    ],
    [
        'id' => 4,
        'title' => 'Quatrieme Post',
        'picture' => 'post3.jpg',
        'content' => 'Ceci est le contenu du quatrieme post.',
        'created_at' => '2024-02-20 14:30:00',
        'is_published' => true,
    ],
    [
        'id' => 5,
        'title' => 'Cinquieme Post',
        'picture' => 'post1.jpg',
        'content' => 'Ceci est le contenu du cinquieme post.',
        'created_at' => '2024-03-05 09:15:00',
        'is_published' => true,
    ],
    [
        'id' => 6,
        'title' => 'Sixieme Post',
        'picture' => 'post2.jpg',
        'content' => 'Ceci est le contenu du sixieme post.',
        'created_at' => '2024-02-20 14:30:00',
        'is_published' => true,
    ],
    [
        'id' => 7,
        'title' => 'Septieme Post',
        'picture' => 'post2.jpg',
        'content' => 'Ceci est le contenu du Septieme post.',
        'created_at' => '2024-03-05 09:15:00',
        'is_published' => true,
    ],
];

?>



<main class="max-w-6xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
    <?php foreach($posts as $post): ?>
        <?php if ($post['is_published']): ?>
            <article class="bg-white shadow-lg rounded-xl p-4 flex flex-col gap-3">
                <img src="/assets/images/<?php echo htmlspecialchars($post['picture']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-48 object-cover rounded-lg">
                <h2 class="text-lg font-bold"><?php echo htmlspecialchars($post['title']); ?></h2>
                <p class="text-slate-700"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <span class="text-sm text-slate-500"><?php echo htmlspecialchars($post['created_at']); ?></span>
                <form method="POST" action="#" class="mt-auto">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
                    <button type="submit" class="cursor-pointer text-sm text-red-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                    </button>
                </form>
            </article>
        <?php endif; ?>
    <?php endforeach; ?>
</main>