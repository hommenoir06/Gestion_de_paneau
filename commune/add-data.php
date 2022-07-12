<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php'; // include l'instance de la class crud.
if(isset($_POST['btn-save'])){ // test sur le bouton. 
	$codecom = $_POST['CODECOM']; // affectation des valeur evoier par la method post.
	$libellecom = $_POST['LIBELLECOM'];
	if($crud->create($codecom,$libellecom)){ // test sur l'execution du requete, 
        header("Location: add-data.php?inserted");    // si tout passe bien returne true, et on recharge la page
    }else{                                            // mais avec "inserted" comme paramétre. 
		header("Location: add-data.php?failure");     // sinon on recharge la page avec "failure" comme paramétre.
	}}
?>
<?php include_once '../head.php'; ?>
<?php
if(isset($_GET['inserted'])){ // alors si on a on paramétre "inserted", on mets un message:
	?>
    <div class="container">
	   <div class="alert alert-info">
        Insertion avec success <!-- le message a afficher avec un style de bootstrap de success--> 
        
	   </div>
	</div>
    <?php
}else if(isset($_GET['failure'])){ // et sinon (on a on paramétre "failure"), on mets u messaga:
	?>
    <div class="container">
	   <div class="alert alert-warning">
        Erreur d'insertion <!--le message-->
	   </div>
	</div>
    <?php
    }
?>

<div class="container">
	<form method='post'><!--creation de la form avec la method post-->
    <table class='table table-bordered'>
        <tr>
            <td>Code commune</td><td><input type='text' name='CODECOM' class='form-control' required></td>
        </tr>
        <tr>
            <td>Libelle Commune</td><td><input type='text' name='LIBELLECOM' class='form-control' required></td>
        </tr>
        <tr>
        <tr>
            <td colspan="2">
            <!--btn-save : button de confirmation-->
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Crée </button>
            <!--lien de retour vers l'index-->  
            <a href="index_com.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Retourner a la liste</a>
            </td>
        </tr>
    </table><!--fin du tableau-->
</form><!--fin de form-->
</div>
<?php include_once '../footer.php'; ?>