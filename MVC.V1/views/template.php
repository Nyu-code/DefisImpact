

<!--Ce fichier php sert de template pour toutes les vues, il s'agit de la base d'un fichier html, en TP il correspond au debut.html et fin.html -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL.$style?>">
    <title><?= $titre?></title>
</head>
<body>
    <header>
        <h1><a href="<?= URL ?>" style=" color:rgb(255, 153, 0);   text-decoration: none;">Defis Impact</a></h1>
    </header>
    <?= $content ?>
    
</body>
</html>