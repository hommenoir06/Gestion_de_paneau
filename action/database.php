<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=atelierGenie', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Une erreur a été trouvé : ' .$e->getMessage()); 
}
 
?>