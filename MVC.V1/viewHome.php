<?php

//Vue de la page d'accueil

$this->titre='DEFIS IMPACT';
foreach($ODD as $ODD): ?>
    <h2><?= $ODD->getName()?></h2>
<?php endforeach; ?>
