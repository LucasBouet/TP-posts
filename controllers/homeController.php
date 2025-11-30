<?php
session_start();
require "models/databaseModel.php";

// Fonction pour récupérer tous les posts publiés
function getPosts() {
    $posts = getAllByTable('publication');
    
    // Corriger les noms des colonnes
    foreach ($posts as &$post) {
        $post['content'] = $post['description'];
        $post['created_at'] = $post['datetime'];
    }
    
    return $posts;
}

// Fonction pour signaler un post
function reportPost($postId) {
    $pdo = getDatabaseConnection();
    $sql = "UPDATE publication SET is_published = 0 WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$postId]);
}

// Récupérer les posts
$posts = getPosts();

// Gérer le signalement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $postId = $_POST['id'];
    reportPost($postId);
    $_SESSION['success'] = 'Publication signalée';
    header('Location: /');
    exit;
}

require "views/header.php";
require "views/homeView.php"; 
require "views/footer.php";