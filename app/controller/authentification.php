<?php
 require_once dirname(__DIR__)."/models/InscriptionModel.php";

function afficherAuthentification(){
    $connexion = getConnexion();
    require_once dirname(__DIR__)."/views/connexion.html.php";
}