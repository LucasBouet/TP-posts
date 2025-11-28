<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/publier.css">
    <title>Publier</title>
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <div>
            <label for="image">File :</label>
            <input type="file" id="image" name="image" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea rows="10" cols=50 type="text" id="description" name="description"></textarea>
        </div>
        <div>
            <button type="submit">Publier</button>
        </div>
    </form>
</body>
</html>