<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php'; // include l'instance de la class crud.
if(isset($_POST['btn-save'])){ // test sur le bouton. 
	$fname = $_POST['NUMREGL']; // affectation des valeur evoier par la method post.
	$lname = $_POST['NUMFACT'];
	$email = $_POST['CODETYPEREG'];
	$contact = $_POST['DATEREGL'];
    $montantRegl = $_POST['MONTANTREGL'];
	if($crud->create($fname,$lname,$email,$contact,$montantRegl)){ // test sur l'execution du requete, 
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
     $donnefacture  = $DB_con->query('SELECT * FROM FACTURE');
     $donnecodetypregl  = $DB_con->query('SELECT * FROM TYPE_REGLEMENT');

?>
<div class="container">
	<form method='post'><!--creation de la form avec la method post-->
    <table class='table table-bordered'>
        <tr>
            <td>Numero reglement</td><td><input type='text' name='NUMREGL' class='form-control' required></td>
        </tr>
        <tr>
            <td>Numero facture<td>
                  
                    <select  name="NUMFACT" required>
                         <option value="">Selectionner</option>
                         <?php  foreach($donnefacture as $donnefacture):;?>
                            
                               <option value="<?= $donnefacture['NUMFACT'];?>"><?=$donnefacture['NUMFACT'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
            
            </td>
        </tr>
        <tr>
            <td>Code type reglement<td>
                
                    <select  name="CODETYPEREG" required>
                         <option value="">Selectionner</option>
                         <?php  foreach($donnecodetypregl as $donnecodetypregl):;?>
                            
                               <option value="<?= $donnecodetypregl['CODETYPEREG'];?>"><?=$donnecodetypregl['CODETYPEREG'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
            
            </td>
        </tr>
        <tr>
            <td>Date reglement</td><td><input type='date' name='DATEREGL' class='form-control' required></td>
        </tr>
        <tr>
            <td>Montant reglement</td><td><input type='number' name='MONTANTREGL' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <!--btn-save : button de confirmation-->
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Crée </button>
            <!--lien de retour vers l'index-->  
            <a href="index_regl.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Retourner</a>
            </td>
        </tr>
    </table><!--fin du tableau-->
</form><!--fin de form-->
</div>
<?php include_once 'footer.php'; ?>