<?php
session_start();
$_SESSION['login']=$_REQUEST["login"];
$_SESSION['password']=$_REQUEST["password"];
if(!isset($_SESSION['login'])){
    header(header: "Location: login.php");
}else{
echo '
        <fieldset>
            <legend>Espace personnee</legend>
            <p>Bonsoir et bienvenue dans votre espace personnel.</p>
            <a href="deconexion.php">Se deconnecter</a>
        </fieldset>'; 
} ?>