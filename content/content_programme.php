<?php
$event_list = array(array(
        "nom1" => "Mariage civil",
        "lieu1" => "Mairie d'Oullins",
        "adresse1" => "Place Roger Salengro 69923 Oullins Cedex",
        "heure1" => "11h30",
        "nom2" => "Messe",
        "lieu2" => "Chapelle du lycée Saint Thomas d'Aquin",
        "adresse2" => "56 rue du Perron",
        "heure2" => "16h30",
    ), array(
        "nom1" => "Réception",
        "lieu1" => "Restaurant B.Bleu",
        "adresse1" => "137 chemin de Molly 69230 Saint-Genis-Laval",
        "heure1" => "18h30",
        "nom2" => "Brunch",
        "lieu2" => "Maison familiale de la famille Lazert",
        "adresse2" => "37 rue Charton 69600 Oullins",
        "heure2" => "Dimanche 12h",
    )
        )
?>
<div id="content">
    <?php
    foreach ($event_list as $event) {
        echo
        '<div class="row">
            <div class="col-md-5 col-md-offset-1">
                <h2>' . $event["nom1"] .' '.$event["heure1"] .'</h2>
            </div>
        <div class="col-md-5 col-md-offset-1">  
            <p>' . $event["lieu1"] . '</p>
            <p>' . $event["adresse1"] . '</p>
        </div>
        </div><br>' . PHP_EOL;
            if (isset($event["nom2"]) && $event["nom2"] != "") {
                echo
                '<div class="col-md-5 col-md-offset-1">          
                    <p>' . $event["lieu2"] . '</p>
                    <p>' . $event["adresse2"] . '</p>
                </div>
    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <h2>' . $event["nom2"] .' '.$event["heure2"] .'</h2>
                    </div>
                </div><br>' . PHP_EOL;
            }
        }
    ?>    
</div>
