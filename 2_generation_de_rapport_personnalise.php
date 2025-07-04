<?php

function genererRapport(array $lecteurs): void
{
    $assiduite = 10;

    echo "--- Rapport sur les emprunts des lecteurs ---</br>";
    echo "-------------------------------------------</br>";

    foreach ($lecteurs as $lecteur) :
        $prenom = $lecteur['prenom'];
        $livresEmpruntes = $lecteur['livres_empruntes'];

        $statut = '';
        if ($livresEmpruntes >= $assiduite) {
            $statut = 'Lecteur assidu</br>';
        } else {
            $statut = 'Lecteur occasionnel</br>';
        }

        echo "$prenom a emprunté $livresEmpruntes livres – $statut</br>";
    endforeach;

    echo "-------------------------------------------</br>";
}

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

// Appel de la fonction pour générer le rapport
genererRapport($lecteurs);