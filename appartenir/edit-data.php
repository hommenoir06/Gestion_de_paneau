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
	$fname = $_POST['NUMCONT'];
	$lname = $_POST['NUMPAN'];

	
	if($crud->update($id,$fname,$lname))
	{
		$msg = "<div class='alert alert-info'>
				Modification avec success
				</div>";
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
     $donneContrat  = $DB_con->query('SELECT * FROM CONTRAT');
     $donnePann  = $DB_con->query('SELECT * FROM PANNEAU');
?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>

        <tr>
            <td>Numero compte<td>
                     <select  name="NUMCONT" required>
                         <option value="<?php echo $NUMCONT; ?>"><?php echo $NUMCONT; ?></option>
                         <?php  foreach($donneContrat as $donneContrat):;?>
                            
                               <option value="<?= $donneContrat['NUMCONT'];?>"><?=$donneContrat['NUMCLI'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
                
            </td>
        </tr>
        <tr>
            <td>Numero panneau<td>
            
                     <select  name="NUMPAN" required>
                         <option value="<?php echo $NUMPAN; ?>">S<?php echo $NUMPAN; ?></option>
                         <?php  foreach($donnePann as $donnePann):;?>
                            
                               <option value="<?= $donnePann['NUMPAN'];?>"><?=$donnePann['NUMPAN'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
                
            </td>
            </td>
        </tr>
 
        <tr>
            
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier 
				</button>
                <a href="index_app.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>