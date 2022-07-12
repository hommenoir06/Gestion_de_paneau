<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php'; // include l'instance de la class crud.
if(isset($_POST['btn-save'])){ // test sur le bouton. 
	$fname = $_POST['NUMCONT']; // affectation des valeur evoier par la method post.
	$lname = $_POST['NUMFACT'];
	$email = $_POST['NUMCLI'];
	$contact = $_POST['DATESIGNATURECONT'];
	if($crud->create($fname,$lname,$email,$contact)){ // test sur l'execution du requete, 
        header("Location: add-data.php?inserted");    // si tout passe bien returne true, et on recharge la page
    }else{                                            // mais avec "inserted" comme paramétre. 
		header("Location: add-data.php?failure");     // sinon on recharge la page avec "failure" comme paramétre.
	}}
?>
<?php include_once 'header.php'; ?>
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
<?php 
     $donnefact  = $DB_con->query('SELECT * FROM FACTURE');
     $donneclient  = $DB_con->query('SELECT * FROM CLIENT');

?>

<div class="container">
	<form method='post'><!--creation de la form avec la method post-->
    <table class='table table-bordered'>
        <tr>
            <td>Numero commune</td><td><input type='text' name='NUMCONT' class='form-control' required></td>
        </tr>
        <tr>
          <td>Numero facture<td>
              <select  name="NUMFACT" required>
                         <option value="">Selectionner</option>
                         <?php  foreach($donnefact as $donnefact):;?>
                            
                               <option value="<?= $donnefact['NUMFACT'];?>"><?=$donnefact['NUMFACT'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
              </select>
          </td>
        <tr>
            <td>Numero client<td>
            <select  name="NUMCLI" required>
                         <option value="">Selectionner</option>
                         <?php  foreach($donneclient as $donneclient):;?>
                            
                               <option value="<?= $donneclient['NUMCLI'];?>"><?=$donneclient['NUMCLI'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
              </select>

            </td>
        </tr>
        <tr>
            <td>Date de signature</td><td><input type='date' name='DATESIGNATURECONT' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <!--btn-save : button de confirmation-->
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Enregistrer le contrat</button>
            <!--lien de retour vers l'index-->  
            <a href="index_contr.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Retourner a la liste</a>
            </td>
        </tr>
    </table><!--fin du tableau-->
</form><!--fin de form-->
</div>
<?php include_once 'footer.php'; ?>