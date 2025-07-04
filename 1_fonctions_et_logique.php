<?php
$lecteurs = [
  [ 'prenom' => 'Aline',   'livres_empruntes'  => 12 ],
  [ 'prenom' => 'Brahim',  'livres_empruntes'  => 5 ],
  [ 'prenom' => 'Chloé',   'livres_empruntes'  => 18] ,
  [ 'prenom' => 'Damien',  'livres_empruntes'  => 2 ],
  [ 'prenom' => 'Élodie',  'livres_empruntes'  => 9 ],
  [ 'prenom' => 'Farid',   'livres_empruntes'  => 21 ],
  [ 'prenom' => 'Gaëlle',  'livres_empruntes'  => 14 ],
  [ 'prenom' => 'Hugo',    'livres_empruntes'  => 6 ],
  [ 'prenom' => 'Inès',    'livres_empruntes'  => 0 ],
  [ 'prenom' => 'Julien',  'livres_empruntes'  => 17 ],
  [ 'prenom' => 'Karima',  'livres_empruntes'  => 11 ],
  [ 'prenom' => 'Luc',     'livres_empruntes'  => 3 ],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h2>Exercice 1.1</h2>
        <p>La moyenne de livres empruntés est de <b><?= calculMoyenneEmprunts($lecteurs); ?></b></p>
        <h2>Exercice 1.2</h2>
        <div><?= var_dump(trierLecteurs($lecteurs)); ?></div>
        <h2>Exercice 1.3</h2>
        <div><?= var_dump(lecteursFrequents($lecteurs)); ?></div>
    </div>
</body>
</html>

<?php
// =============================== //
// Exercice 1.1
function calculMoyenneEmprunts(array $lecteurs): float {

    $totalLivres = 0;
    foreach ($lecteurs as $lecteur) :
        $totalLivres += $lecteur['livres_empruntes'];
    endforeach;

    $result = $totalLivres / count($lecteurs);
    return round($result, 2);
}

// =============================== //
// Exercice 1.2
function trierLecteurs(array $lecteurs): array {
    usort($lecteurs, function($a, $b) {
        if ($a['livres_empruntes'] < $b['livres_empruntes']) {
            return 1;
        } elseif ($a['livres_empruntes'] > $b['livres_empruntes']) {
            return -1;
        } else {
            return 0;
        }
    });
    return $lecteurs;
}

// =============================== //
// Exercice 1.3
function lecteursFrequents(array $lecteurs): array
{
    $lecteursFrequents = [];

    foreach ($lecteurs as $lecteur) :
        if ($lecteur['livres_empruntes'] >= 10) {
            $lecteursFrequents[] = $lecteur;
        }
    endforeach;

    return $lecteursFrequents;
}

?>







