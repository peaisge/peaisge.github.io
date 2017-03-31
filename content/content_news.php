<?php
$hotel_list = array(array(
        "nom1" => "Hôtel B.Bleu",
        "adresse1" => "137 chemin de Molly, 69230 Saint-Genis-Laval",
        "prix1" => "75€",
        "temps1" => "25 secondes",
        "nom2" => "Gîte La Clé des Artistes",
        "adresse2" => "17 chemin de Moly,69230 Saint-Genis-Laval",
        "prix2" => "58€",
        "temps2" => "3 minutes"
    ), array("nom1" => "Ibis Budget Saint-Genis-Laval",
        "adresse1" => "165 routes des Vourles, 69230 Saint-Genis-Laval",
        "prix1" => "60€",
        "temps1" => "11 minutes",
        "nom2" => "Kiriad Saint-Genis-Laval",
        "adresse2" => "179 Route de Vourles, 69230 Saint-Genis-Laval",
        "prix2" => "75€",
        "temps2" => "11 minutes"),
    array("nom1" => "Kiriad Sainte-Foy-lès-Lyon",
        "adresse1" => "35 Chemin de la Croix Pivort, 69110 Sainte-Foy-lès-Lyon",
        "prix1" => "60€",
        "temps1" => "10 minutes",
        "nom2" => "Campanile Confluence Oullins",
        "adresse2" => "2, Place Kellermann, 69600 Oullins",
        "prix2" => "75€",
        "temps2" => "12 minutes"),
    array("nom1" => "Hôtel F1 Oullins",
        "adresse1" => "10/12 rue Elisée Reclus, 69600 Oullins ",
        "prix1" => "60€",
        "temps1" => "10 minutes",
        "nom2" => "Hôtel Lyon Sud - Pierre Bénite",
        "adresse2" => "130 Rue Jules Guesde, 69310 Pierre-Bénite",
        "prix2" => "75€",
        "temps2" => "10 minutes"),
    array("nom1" => "Hôtel de l'Europe - Pierre Bénite",
        "adresse1" => "67 Boulevard de l'Europe, 69310 Pierre-Bénite",
        "prix1" => "60€",
        "temps1" => "15 minutes")
        )
?>
<div id="content">
    <div>
        <h1><?php $pageTitle ?></h1>
        <p>Voici les dernières news</p>
    </div>
    <?php
    foreach ($hotel_list as $hotel) {
        echo
        '<div class="row">
        <div class="col-md-5 col-md-offset-1">
            <h2>' . $hotel["nom1"] . '</h2>
        </div>
        <div class="col-md-5 col-md-offset-1">          
            <p>Adresse : ' . $hotel["adresse1"] . '</p>
            <p>Prix approximatif : ' . $hotel["prix1"] . '</p>
            <p>À ' . $hotel["temps1"] . ' du lieu de réception</p>
        </div>
    </div><br>' . PHP_EOL;
        if (isset($hotel["nom2"]) && $hotel["nom2"] != "") {
            echo
            '<div class="col-md-5 col-md-offset-1">          
            <p>Adresse : ' . $hotel["adresse2"] . '</p>
            <p>Prix approximatif : ' . $hotel["prix2"] . '</p>
            <p>À ' . $hotel["temps2"] . ' du lieu de réception</p>
        </div>
    
                <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <h2>' . $hotel["nom2"] . '</h2>
        </div>
    </div><br>' . PHP_EOL;
        }
    }
    ?>    
</div>