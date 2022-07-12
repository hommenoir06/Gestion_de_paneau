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
	$fname = $_POST['NUMFACT'];
	$lname = $_POST['DATEFACT'];
	
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
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Numero de la facture</td>
            <td><input type='text' name='NUMFACT' class='form-control' value="<?php echo $NUMFACT; ?>" required></td>
        </tr>
 
        <tr>
            <td>Date d'enregistrement</td>
            <td><input type='date' name='DATEFACT' class='form-control' value="<?php echo $DATEFCAT; ?>" required></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier la facture
				</button>
                <a href="index_fact.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>