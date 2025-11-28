<?php 
// function limitOutput($text, $maxLength) {
//     if (strlen($text) <= $maxLength) {
//         return $text;
//     }
//     return substr($text, 0, $maxLength) . '...';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/admin.css">
    <title>Admin</title>
</head>
<body>
    <form method="GET">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <?php if (!$post['is_published']): ?>
                        <tr>
                            <td><?= htmlspecialchars($post['id']) ?></td>
                            <td><?= htmlspecialchars($post['title']) ?></td>
                            <td><?= limitOutput(htmlspecialchars($post['content']), 200) ?></td>
                            <td>
                                <button formaction="/admin?accept=<?= urlencode($post['id']) ?>">Accepter</button>
                            </td>
                            <td>
                                <button formaction="/admin?delete=<?= urlencode($post['id']) ?>">Refuser</button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <form method="GET">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['id']) ?></td>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td><?= limitOutput(htmlspecialchars($post['content']), 200) ?></td>
                        <td>
                            <button formaction="/admin?delete=<?= urlencode($post['id']) ?>">Refuser</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</body>
</html>