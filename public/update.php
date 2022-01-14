<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Table\ArticleTable;

$id = $_GET["id"];

$title = 'Update article';
$pageTitle = 'Update article';
$description = 'Modify the article';

include __DIR__ . '/../templates/start.php';

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$table = new ArticleTable($pdo);
$article = $table->fetchOne($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $table->updateOne(
        $id,
        $_POST['title'],
        $_POST['description'],
        $_POST['content'],
    );
}

?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <h3>L'article "<?= $_POST['title'] ?>" à bien été modifié</h3>
<?php endif ?>

<form method="POST">
    <!-- <div>
        <label for="id">Numero d'article :</label>
        <input type="number" name="id" placeholder="Numero d'article" id="id" min="1" max="100"/>
    </div> -->
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title"  id="title" value="<?= $article['title']?>" />
    </div>
    <div>
        <label for="description">Description :</label>
        <input type="text" name="description"  id="description" value="<?= $article['description']?>" />
    </div>
    <div>
        <label for="content">Contenue :</label>
        <textarea id="content" name="content" value="<?= $article['content']?>"></textarea>
    </div>
    <div>
        <button type="submit">Modifier l'article</button>
    </div>
</form>

<?php include __DIR__ . '/../templates/end.php'; 

?>