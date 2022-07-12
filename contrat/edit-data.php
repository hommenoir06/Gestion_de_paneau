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
	$lname = $_POST['NUMFACT'];
	$email = $_POST['NUMCLI'];
	$contact = $_POST['DATESIGNATURECONT'];
	
	if($crud->update($id,$fname,$lname,$email,$contact))
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
     $donnefact  = $DB_con->query('SELECT * FROM FACTURE');
     $donneclient  = $DB_con->query('SELECT * FROM CLIENT');

?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
 
        <tr>
            <td>Numero commune</td><td><input type='text' name='NUMCONT' class='form-control' value="<?php echo $NUMCONT; ?>"required></td>
        </tr>
        <tr>
          <td>Numero facture<td>
              <select  name="NUMFACT" required>
                         <option value="">Selectionner</option>
                         <option value="<?php echo $NUMFACT; ?>"><?php echo $NUMFACT;?></option>
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
            <td>Date de signature</td><td><input type='date' name='DATESIGNATURECONT' class='form-control'value="<?php echo $DATESIGNATURECONT; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier 
				</button>
                <a href="index_contr.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>