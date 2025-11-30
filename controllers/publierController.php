<?php

require "models/databaseModel.php";

date_default_timezone_set('Europe/Paris');

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $image = $_FILES["image"] ?? null;

    if (empty($title)) {
        $errors[] = "Le titre est obligatoire.";
    }

    if (!$image || $image["error"] !== 0) {
        $errors[] = "L'image est obligatoire.";
    }

    if ($image && $image["error"] === 0) {
        if (strpos($image["type"], "image/") !== 0) {
            $errors[] = "Le fichier doit être une image.";
        }
    }

    if (empty($errors)) {
        $pdo = getDatabaseConnection();

        $imageName = time() . "_" . basename($image["name"]);
        $destination = "assets/images/" . $imageName;

        if (move_uploaded_file($image["tmp_name"], $destination)) {
            $datetime = date("Y-m-d H:i");

            $stmt = $pdo->prepare("INSERT INTO publication (title, picture, description, datetime, is_published)
                VALUES (:title, :picture, :description, :datetime, :is_published)");

            $stmt->execute([
                ":title" => $title,
                ":picture" => $imageName,
                ":description" => $description ?: null,
                ":datetime" => $datetime,
                ":is_published" => 0
            ]);
            echo "Publication ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'envoi de l'image.";
        }
    }
}

require "views/header.php";
require "views/publierView.php";
require "views/footer.php";