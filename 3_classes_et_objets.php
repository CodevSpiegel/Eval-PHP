<?php
// Création de 5 vélos avec des états différents
$velo1 = new Velo('BMX', 'en service');
$velo2 = new Velo('Tandem', 'loué');
$velo3 = new Velo('Hybrides', 'en réparation');
$velo4 = new Velo('FatBike', 'en service');
$velo5 = new Velo('Tricycle', 'loué');

// Création de la station
$station = new Station();

// Ajout des vélos à la station
$station->ajouterVelo($velo1);
$station->ajouterVelo($velo2);
$station->ajouterVelo($velo3);
$station->ajouterVelo($velo4);
$station->ajouterVelo($velo5);

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
        <h2>Vélos disponibles :</h2>
        <ul>
            <?php
            foreach ($station->listerDisponibles() as $veloDisponible) :
                echo "<li>" . $veloDisponible->afficher() . "</li>";
            endforeach;
            ?>
        </ul>
        <h2>Nombre de vélos par état :</h2>
        <ul>
            <?php
            foreach ($station->compterParEtat() as $etat => $nombre) :
                echo "<li>" . ucfirst($etat) . " : $nombre</li>";
            endforeach;
            ?>
        </ul>
    </div>
</body>
</html>

<?php

class Velo {
    private string $modele;
    private string $etat;

    public function __construct(string $modele, string $etat = 'en service') {
        $this->modele = $modele;
        $this->etat = $etat;
    }

    public function estDisponible(): bool {
        return $this->etat === 'en service';
    }

    public function changerEtat(string $nouvelEtat): void {
        $this->etat = $nouvelEtat;
    }

    public function afficher(): string {
        return "Vélo {$this->modele} – " . ucfirst($this->etat);
    }

    public function getEtat(): string {
        return $this->etat;
    }
}


class Station {
    private array $velos = [];

    public function ajouterVelo(Velo $velo): void {
        $this->velos[] = $velo;
    }

    public function listerDisponibles(): array {
        $disponibles = [];
        foreach ($this->velos as $velo) {
            if ($velo->estDisponible()) {
                $disponibles[] = $velo;
            }
        }
        return $disponibles;
    }

    public function compterParEtat(): array {
        $compteur = [
            'en service' => 0,
            'loué' => 0,
            'en réparation' => 0
        ];
        foreach ($this->velos as $velo) :
            $etat = $velo->getEtat();
            if (isset($compteur[$etat])) {
                $compteur[$etat]++;
            } else {
                $compteur[$etat] = 1; // Pour tout nouvel état inattendu
            }
        endforeach;
        return $compteur;
    }
}