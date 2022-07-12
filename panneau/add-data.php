<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php'; // include l'instance de la class crud.
if(isset($_POST['btn-save'])){ // test sur le bouton. 
    $fname = $_POST['NUMPAN']; // affectation des valeur evoier par la method post.
	$lname = $_POST['CODECOM'];
	$email = $_POST['FORMATPAN'];
	$contact = $_POST['TYPEPAN'];
    $sitePan = $_POST['SITEPAN'];
    $imPan = $_POST['IMAGEPAN'];
    $etatPan = $_POST['ETATPAN'];
    $prixPan = $_POST['PRIXUNITAIREPAN'];
    ////////////////////////////
    /*if(isset($_FILES['IMAGEPAN'])){
        $tmpName = $_FILES['IMAGEPAN']['tmp_name'];
        $name = $_FILES['IMAGEPAN']['name'];
        $size = $_FILES['IMAGEPAN']['size'];
        $error = $_FILES['IMAGEPAN']['error'];
        
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        //Taille max que l'on accepte
        $maxSize = 400000;
        
        if(in_array($extension, $extensions)){
        
            if($size <= $maxSize ){ //on verifie que la taille est bonne
        
                if($error == 0){ //on verifie qu'il n'y a pas d'erreur
                    // augmenter des fichier si il y a repetion du nom
                    $uniqueName = uniqid('', true); 
                    $imPan = $uniqueName.".".$extension;
                    
                    move_uploaded_file($tmpName, './image/'.$imPan);
                    return $imPan;
                }else echo "une erreur est survenue";
            }else{
                echo "taille trop grange";
            }
           
        }
         }else{
            echo "Mauvaise extension";
        }*/
    
    


	if($crud->create($fname,$lname,$email,$contact,$sitePan,$imPan,$etatPan,$prixPan)){ // test sur l'execution du requete, 
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
<?php 
     $donne  = $DB_con->query('SELECT * FROM COMMUNE');
?>
<div class="container">
	<form   method='post'><!--creation de la form avec la method post-->
    <table class='table table-bordered'>
        <tr>
            <td>Numero panneau</td><td><input type='text' name='NUMPAN' class='form-control' required></td>
        </tr>
        <tr>
          <td>Code commune<td>
              
                     
                     <select  name="CODECOM" required>
                         <?php  foreach($donne as $donne):;?>
                            
                               <option value="<?= $donne['CODECOM'];?>"> <?=$donne['LIBELLECOM'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
                        
         </td>
        </tr>
        <tr>
            <td>Format panneau</td><td><input type='text' name='FORMATPAN' class='form-control' required></td>
        </tr>
        <tr>
            <td>Type panneau</td><td><input type='text' name='TYPEPAN' class='form-control' required></td>
        </tr>
        <tr>
        <tr>
            <td>Site du panneau</td><td><input type='text' name='SITEPAN' class='form-control' required></td>
        </tr>
        <tr>
            <td>image panneau</td><td><input type='file' name='IMAGEPAN' class='form-control' required></td>
        </tr>
        <tr>
            <td>Etat panneau</td><td><input type='text' name='ETATPAN' class='form-control' required></td>
        </tr>
        <tr>
            <td>Prix panneau</td><td><input type='number' name='PRIXUNITAIREPAN' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <!--btn-save : button de confirmation-->
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Crée le panneau</button>
            <!--lien de retour vers l'index-->  
            <a href="index_pan.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Retourner a la liste</a>
            </td>
        </tr>
    </table><!--fin du tableau-->
</form><!--fin de form-->
</div>
<?php include_once 'footer.php'; ?>