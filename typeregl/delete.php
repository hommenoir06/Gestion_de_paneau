<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php';

if(isset($_POST['btn-del']))
{
	$codetypereg = $_GET['delete_id'];
	$crud->delete($codetypereg);
	header("Location: delete.php?deleted");	
}

?>
<?php include_once '../head.php'; ?>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	suppression avec succés 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
        sûre de faire la suppression
		</div>
        <?php
	}
	?>	
</div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>Code reglement</th>
         <th>Type reglement</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM TYPE_REGLEMENT WHERE CODETYPEREG=:CODETYPEREG");
         $stmt->execute(array(":CODETYPEREG"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['CODETYPEREG']); ?></td>
             <td><?php print($row['LIBELLETYPEREG']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="CODETYPEREG" value="<?php echo $row['CODETYPEREG']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Oui</button>
    <a href="index_tpregl.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Non</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index_tpregl.php" class="btn btn-large btn-success" style="float: right"><i class="glyphicon glyphicon-backward"></i> &nbsp; Returner vers l'index</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>