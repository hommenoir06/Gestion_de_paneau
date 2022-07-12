<?php 
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/
?>
<?php include_once 'dbconfig.php'; ?> <!--inclure de l'instance de la class crud-->
<?php include_once 'dbconfig.php'; ?> <!--inclure de l'instance de la class crud-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title></title>


</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Acceuil<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../commune/index_com.php">Commune</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../client/index_cli.php">Client</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../panneau/index_pan.php">Panneau</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../typeregl/index_tpregl.php">Type reglement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../reglement/index_regl.php">Reglement</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../contrat/index_contr.php">Contrat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../appartenir/index_app.php">Appartenance</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container">
    <!--lien vers la page d'ajoute d'utilisateur-->
    <a href="add-data.php" class="btn btn-large btn-info">
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter une facture
    </a>
</div>
<br />
<div class="container"> 
    <!--creation du tableau-->
	<table class='table table-bordered table-responsive'> 
        <tr>
            <th>Numero de la facture</th>
            <th>Date d'enregistrement</th>
            <th colspan="2" align="center">Actions</th>
        </tr>
        <?php    
		  $crud->dataview("SELECT * FROM FACTURE"); // l'appele du méthode d'affichage.
	    ?>
    </table> 
</div>
<?php include_once 'footer.php'; ?> <!--inclure le footer de la page -->