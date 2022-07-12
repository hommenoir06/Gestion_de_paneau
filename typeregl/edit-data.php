<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$codetypereg = $_GET['edit_id'];
	$libelletypereg = $_POST['LIBELLETYPEREG'];
	
	if($crud->update($codetypereg,$libelletypereg))
	{
		$msg = "<div class='alert alert-info'>00
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
	$codetypereg = $_GET['edit_id'];
	extract($crud->getID($codetypereg));
    	
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
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Code type reglement</td>
            <td><input type='text' name='CODETYPEREG' class='form-control' value="<?php echo $CODETYPEREG; ?>" required></td>
        </tr>
 
        <tr>
            <td>Libelle type reglement</td>
            <td><input type='text' name='LIBELLETYPEREG' class='form-control' value="<?php echo $LIBELLETYPEREG ; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier
				</button>
                <a href="index_tpregl.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>