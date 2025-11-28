<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/home.css">
    <title>Home</title>
</head>
<body>
    <?php foreach($posts as $post): ?>
        <div>
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            <span><?php echo htmlspecialchars($post['created_at']); ?></span>
            <form method="POST" action="#">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
                <button type="submit">Report</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>