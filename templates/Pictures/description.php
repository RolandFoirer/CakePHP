<?php
$this->assign('title',"Description image");
?>
<!doctype html>
<html lang="fr">
<body>
<main role="main">
    <div class="pictures">
        <div>
            <?php
            /** @var array $out */
            echo '<a href="\\img\\'.htmlentities($out['file']).'" download>
                télécharger image
                </a>';
            echo $out['html'];
            ?>
        </div>
        <div>
            <?php
            echo '<p>Description: '.$out['description'].'</p>';
            echo '<p>Commentaire: '.$out['comment'].'</p>';
            echo '<p>Auteur: '.$out['author'].'</p>';
            echo '<p>Longueur: '.$out['width'].'</p>';
            echo '<p>Largeur: '.$out['height'].'</p>';
            ?>
        </div>
    </div>
</main>
</body>
</html>
