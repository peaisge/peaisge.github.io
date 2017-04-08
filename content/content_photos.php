<?php
if ($_SESSION['status'] == 1) {
    
} else {
    
}
?>


<div class="jumbotron margin">
    <h1>Titre qui ne depend pas de la page</h1>
    <p>Détails supplémentaires qui ne dépendent pas de la page</p>
</div>

<div id="content">
    <div>
        <h1><?php $pageTitle ?></h1>
        <p>Les photos des mariés</p>
        <p>Les photos des invités</p>
    </div>

</div>

<div id="gallery">

    <img alt="Image 1 Title" src="https://upload.wikimedia.org/wikipedia/commons/6/60/Brad_Pitt_2013.jpg"
         data-image="https://upload.wikimedia.org/wikipedia/commons/6/60/Brad_Pitt_2013.jpg"
         data-description="Image 1 Description">

    <img alt="Image 2 Title" src="media/fleurs.jpg"
         data-image="media/fleurs.jpg"
         data-description="Image 2 Description">

</div>