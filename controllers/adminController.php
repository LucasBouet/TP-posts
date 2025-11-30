<?php

require "models/databaseModel.php";
// recup les tables de la bdd
function keepTable()
{
    $db = getDatabaseConnection();
    $tables = getAllByTable('publication');
    return $tables;

}

// fonction supr et verif

function deleteline($db, $table, $id)
{
    $sql = "DELETE FROM $table WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function getImagePathById($db, $id)
{
    $sql = "SELECT picture FROM publication WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
    return $row['picture'] ?? null;
}

function suppr($id)
{
    $db = getDatabaseConnection();
    $table = 'publication';
    
    // Récupère le chemin de l'image
    $imagePath = getImagePathById($db, $id);
    var_dump($imagePath); // Debug
    
    // Supprime l'image du dossier
    if ($imagePath) {
        $fullPath = __DIR__ . '/../assets/images/' . $imagePath;
        var_dump($fullPath); // Debug
        var_dump(file_exists($fullPath)); // Debug
        
        if (file_exists($fullPath)) {
            unlink($fullPath);
            echo "Image supprimée : " . $fullPath;
        }
    }
    
    deleteline($db, $table, $id);
}

// function faire publier
function setProductPublished($db, $id)
{
    $sql = "UPDATE publication SET is_published = 1 WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}


// function previuw
function getPublicationPreview($db, $idVar)
{
    $sql = "SELECT title, `datetime`, description FROM publication WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $idVar, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "pas de publication avec cet ID.";
        return null;
    }

    $text = $row['description'];
    $pos = strpos($text, '.');

    if ($pos !== false) {
        $row['description'] = substr($text, 0, $pos + 1);
    } else {
        $row['description'] = substr($text, 0, 50);
    }

    return $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // la protection CSRF devrait être ici mais manque de temps / organisation, il aurait fallu un fichier different pour le valider
    $action = $_POST['action'] ?? null;
    $postId = $_POST['id'] ?? null;
    if ($action && $postId && is_numeric($postId)) {
        $db = getDatabaseConnection();
        if ($action === 'delete') {
            suppr($postId);
            header('Location: /admin');
            exit;
        } elseif ($action === 'accept') {   
            setProductPublished($db, $postId);  
            header('Location: /admin');
            exit;
        }
    }
}

$posts = keepTable();

require "views/header.php";
require "views/adminView.php";
require "views/footer.php";