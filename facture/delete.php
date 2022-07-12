<?php

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
         <th>Numero de la facture</th>
         <th>Date de la facture</th>
         
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM FACTURE WHERE NUMFACT=:NUMFACT");
         $stmt->execute(array(":NUMFACT"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['NUMFACT']); ?></td>
             <td><?php print($row['DATEFACT']); ?></td>
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
  	<form method="post">idy" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Oui</button>
    <a href="index_fact.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Non</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index_fact.php" class="btn btn-large btn-success" style="float: right"><i class="glyphicon glyphicon-backward"></i> &nbsp; Returner a la liste</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>