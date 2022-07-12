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
	$fname = $_POST['NUMREGL']; 
	$lname = $_POST['NUMFACT'];
	$email = $_POST['CODETYPEREG'];
	$contact = $_POST['DATEREGL'];
    $montantRegl = $_POST['MONTANTREGL'];
	
	if($crud->update($id,$fname,$lname,$email,$contact,$montantRegl))
	{
		$msg = "<div class='alert alert-info'>
				Modification avec success
				</div>";
            header('Loaction: index_regl.php');
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
     $donnefacture  = $DB_con->query('SELECT * FROM FACTURE');
     $donnecodetypregl  = $DB_con->query('SELECT * FROM TYPE_REGLEMENT');

?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Numero reglement</td><td><input type='text' name='NUMREGL' class='form-control' value="<?php echo $NUMREGL ?>" required></td>
        </tr>
        <tr>
            <td>Numero facture<td>
                  
                    <select  name="NUMFACT" required>
                         <option value="<?=$donnefacture['NUMFCT']?>"><?=$donnefacture['NUMFCT']?></option>
                         <?php  foreach($donnefacture as $donnefacture):;?>
                            
                               <option value="<?= $donnefacture['NUMFACT'];?>"><?=$donnefacture['NUMFACT'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
            
            </td>
        </tr>
        <tr>
            <td>Code type reglement<td>
                
                    <select  name="CODETYPEREG" required>
                        <option value="<?php echo $CODETYPEREG; ?>"><?php echo $CODETYPEREG; ?></option>
                        
                         <?php  foreach($donnecodetypregl as $donnecodetypregl):;?>
                            
                               <option value="<?= $donnecodetypregl['CODETYPEREG'];?>"><?=$donnecodetypregl['CODETYPEREG'];?></option>
                            
                             <?php endforeach;
                            ?>
                            
                     </select>
            
            </td>
        </tr>
        <tr>
            <td>Date reglement</td><td><input type='date' name='DATEREGL' class='form-control' value="<?php echo $DATEREGL ?>" required></td>
        </tr>
        <tr>
            <td>Montant reglement</td><td><input type='number' name='MONTANTREGL' class='form-control' value="<?php echo $MONTANTREGL ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Modifier 
				</button>
                <a href="index_regl.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>