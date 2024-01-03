<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warcraft Battle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .round {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .details {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<?php

require_once('Hero.php');
require_once('Orc.php');

$hero = new Hero("Sora", "Poing", 25000, "Muscle", 450, 10000, 0);
$orc = new Orc("Grommash Hellscream", "Warrior", "NomDeLArme", 500, "NomDeLArmure", 300, 2000, 0);

$round = 1;

while ($hero->isAlive() && $orc->isAlive()) {
    echo "<div class='round'>Round $round</div>";

    
    $heroAttack = $hero->attack();
    $orcDefense = $orc->beAttacked($heroAttack);

    echo "<div class='details'>Attaquant: {$hero->getName()} - Valeur de l'attaque: $heroAttack.</div>";
    echo "<div class='details'>Défenseur: {$orc->getName()} - Dégât reçu: $orcDefense. Vie restante: {$orc->getHealth()} pts.</div>";

    if (!$orc->isAlive()) {
        echo "<div class='details'>{$orc->getName()} meurt. {$hero->getName()} a gagné!</div>";
        break;
    }

    
    $orcAttack = $orc->attack();
    $heroDefense = $hero->beAttacked($orcAttack);

    echo "<div class='details'>Attaquant: {$orc->getName()} - Valeur de l'attaque: $orcAttack.</div>";
    echo "<div class='details'>Défenseur: {$hero->getName()} - Dégât reçu: $heroDefense. Vie restante: {$hero->getHealth()} pts.</div>";

    if (!$hero->isAlive()) {
        echo "<div class='details'>{$hero->getName()} meurt. {$orc->getName()} a gagné!</div>";
        break;
    }

    $round++;
}

?>

</body>
</html>
