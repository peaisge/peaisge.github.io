<?php
session_start();
?>
<!DOCTYPE html>
<div class="jumbotron">
<h1>Titre qui ne dépend pas de la page</h1>
<p>Détails supplémentaires qui ne dépendent pas de la page</p>
</div>

<div id="content">
<div>
    <h1><?php $pageTitle ?></h1>
    <p>Contenu du corps principal de la page, dépend de la page affichée</p>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-2">
        <h3>Olivier Serre</h3>
        <p>Olivier se charge des amphis de la période 4…</p>
    </div>
    <div class="col-md-3 col-md-offset-2">
        <h3>Dominique Rossin</h3>
        <p>Dominique est le gourou historique du modal web…</p>
    </div>
</div>
</div>

<br>