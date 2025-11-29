<?php

require "models/databaseModel.php";
// recup les tables de la bdd
function keepTable()
{
    $db = connectDatabase();
    $tables = getTables($db);
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

function suppr()
{
    if (isset($_POST['supprimer'])) {
        $db = connectDatabase();
        $table = $_POST['table'];
        $id = $_POST['id'];
        deleteline($db, $table, $id);
    }
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

require "views/header.php";
require "views/adminView.php";
require "views/footer.php";