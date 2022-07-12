
<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$codecom = $_GET['edit_id'];
	$libellecom = $_POST['LIBELLECOM'];
	
	if($crud->update($codecom,$libellecom))
	{
		$msg = "<div class='alert alert-info'>
				Modification avec success
				</div>";
      header('Location: index_com.php');
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
    
	$codecom = $_GET['edit_id'];
    $libellecom = "";
	extract($crud->getID($codecom));	
   
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

<?php include_once '../footer.php'; ?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <?php // $libellecom = "bonjour"?>
        <tr>
            <td>Code commune</td>
            <td><input type='text' name="CODECOM" class='form-control' value="<?php echo $CODECOM; ?>" required></td>
        </tr>
 
        <tr>
            <td>Libelle commune</td>
            <td><input type='text' name="LIBELLECOM" class='form-control' value="<?php echo $LIBELLECOM; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier l'utilisateur
				</button>
                <a href="index_com.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>

