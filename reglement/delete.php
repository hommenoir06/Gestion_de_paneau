<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

include_once 'dbconfig.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

?>
<?php include_once 'header.php'; ?>

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
         <th>Numero reglement</th>
         <th>Numero facture</th>
         <th>Code type reglement</th>
         <th>Date reglement</th>
         <th>Montant reglement</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM REGLEMENT WHERE NUMREGL =:NUMREGL");
         $stmt->execute(array(":NUMREGL"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['NUMREGL']); ?></td>
             <td><?php print($row['NUMFACT']); ?></td>
             <td><?php print($row['CODETYPEREG']); ?></td>
             <td><?php print($row['DATEREGL']); ?></td>
         	 <td><?php print($row['MONTANTREGL']); ?></td>
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
    <input type="hidden" name="NUMREGL" value="<?php echo $row['NUMREGL']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Oui</button>
    <a href="index_regl.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Non</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index_regl.php" class="btn btn-large btn-success" style="float: right"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retourner </a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>