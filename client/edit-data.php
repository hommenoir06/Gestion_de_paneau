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
	$fname = $_POST['NUMCLI']; // affectation des valeur evoier par la method post.
	$lname = $_POST['CODECOM'];
	$email = $_POST['RAISONSOCIALECLI'];
	$contact = $_POST['TELCLI'];
    $ddr = $_POST['ADRESSEPOSTALECLI'];
    $email2 = $_POST['EMAILCLI'];
	
	if($crud->update($id,$fname,$lname,$email,$contact,$ddr,$email2))
	{
		
        header('Location: index_cli.php');
                
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

<?php include_once 'header.php'; ?>
<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
<?php 
     $donne  = $DB_con->query('SELECT * FROM COMMUNE');
?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Numero client</td>
            <td><input type='text' name='NUMCLI' class='form-control' value="<?php echo $NUMCLI; ?>" required></td>
        </tr>
 
        <tr>
          <td>Code commune<td>
              
                    
                     <select  name="CODECOM" required>
                     <option value="<?php echo $CODECOM; ?>"><?php echo $CODECOM; ?></option>
                         <?php  foreach($donne as $donne):;?>
                            
                               <option value="<?= $donne['CODECOM'];?>"><?=$donne['CODECOM'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
                        
         </td>
        </tr>
 
        <tr>
            <td>Raison social</td>
            <td><input type='text' name='RAISONSOCIALECLI' class='form-control' value="<?php echo $RAISONSOCIALECLI; ?>" required></td>
        </tr>
 
        <tr>
            <td>telephone client</td>
            <td><input type='text' name='TELCLI' class='form-control' value="<?php echo $TELCLI; ?>" required></td>
        </tr>
        <tr>
            <td>Addresse client</td>
            <td><input type='text' name='ADRESSEPOSTALECLI' class='form-control' value="<?php echo $ADRESSEPOSTALECLI; ?>" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='EMAILCLI' class='form-control' value="<?php echo $EMAILCLI; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier 
				</button>
                <a href="index_cli.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>