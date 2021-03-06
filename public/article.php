<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Table\ArticleTable;

// Récupération de l'id de larticle:
$id = $_GET['id'];
// Création d'une instance de PDO (connection à la base de données)
$connection = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
$table = new ArticleTable($connection);
$article = $table->fetchOne($id);
?>

<?php
$title = $article['title'];
$pageTitle = $article['title'];
$description = $article['description'];

include __DIR__ . '/../templates/start.php';
?>

<?= $article['content']?>

<a href="update.php?id=<?= $article['id'] ?>"><button type="button">Modifier</button></a>

<?php include __DIR__ . '/../templates/end.php'; ?>;