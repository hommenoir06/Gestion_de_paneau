<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$fname = $_POST['NUMPAN']; // affectation des valeur evoier par la method post.
	$lname = $_POST['CODECOM'];
	$email = $_POST['FORMATPAN'];
	$contact = $_POST['TYPEPAN'];
    $sitePan = $_POST['SITEPAN'];
    $imPan = $_POST['IMAGEPAN'];
    $etatPan = $_POST['ETATPAN'];
    $prixPan = $_POST['PRIXUNITAIREPAN'];
	
	if($crud->update($id,$fname,$lname,$email,$contact,$sitePan,$imPan,$etatPan,$prixPan))
	{
		$msg = "<div class='alert alert-info'>
				Modification avec success
				</div>";
        header('Location: index_pan.php ');
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				Erreur de modification
                </div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}
?>

<?php include_once '../head.php'; ?>
<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>
<?php 
     $donne  = $DB_con->query('SELECT * FROM COMMUNE');
?>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Numero panneau</td>
            <td><input type='text' name='NUMPAN' class='form-control' value="<?php echo $NUMPAN; ?>" required></td>
        </tr>
 
        <tr>
          <td>Code commune<td>
              
                     
                     <select  name="CODECOM" required>
                     <option value="<?php echo $CODECOM; ?>"><?php echo $CODECOM; ?></option>
                         <?php  foreach($donne as $donne):;?>
                            
                               <option value="<?= $donne['CODECOM'];?>"> <?=$donne['LIBELLECOM'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
                        
         </td>
        </tr>
 
        <tr>
            <td>Format panneau</td>
            <td><input type='text' name='FORMATPAN' class='form-control' value="<?php echo $FORMATPAN; ?>" required></td>
        </tr>
 
        <tr>
            <td>Type panneau</td>
            <td><input type='text' name='TYPEPAN' class='form-control' value="<?php echo $TYPEPAN; ?>" required></td>
        </tr>
 
        <tr>
        <tr>
            <td>Site du panneau</td>
            <td><input type='text' name='SITEPAN' class='form-control' value="<?php echo $SITEPAN; ?>"required></td>
        </tr>
 
        <tr>
            <td>image panneau</td>               <img src="" alt="">
            <td><input type='file' name='IMAGEPAN' class='form-control' value="<?php echo $IMAGEPAN; ?>" required></td>
        </tr>
 
        <tr>
            <td>Etat panneau</td>
            <td><input type='text' name='ETATPAN' class='form-control' value="<?php echo $ETATPAN; ?>" required></td>
        </tr>
 
        <tr>
            <td>Prix panneau</td>
            <td><input type='number' name='PRIXUNITAIREPAN' class='form-control' value="<?php echo $PRIXUNITAIREPAN; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier 
				</button>
                <a href="index_pan.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>