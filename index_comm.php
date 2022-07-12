<?php include("head.php");
      include("nav_index.php");
      include("action/commande.php");
?>
<div class="card text-center">
        <div class="alert alert-primary" role="alert">
           <h3>Ajouter une commune</h3>
        </div>
  <div class="card-body">
     <div class="card-text">
     <?php if(isset($errorMsg)){ echo '<p>' .$errorMsg. '</p>';}?>

             <form method="POST">                      
                       <div class="form-group">
                           <label>Libelle Commune</label>
                           <input type="text" class="form-control" placeholder="Commune" name="libCommune">
                       </div>
                       <div class="form-group">
                           <label>Code Commune</label>
                           <input type="text" class="form-control" placeholder="Code Commune" name="codeCommune">
                       </div>
                       
                   <button class="btn signup" type="submit" name="valider">Enregistrer</button>
            </form>
    </div>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>


<?php include("footer.php")
?>
<?php
if(isset($_POST['valider'])){
  

if(isset($_POST['libCommune']) AND isset($_POST['codeCommune'])){
    

    if(!empty($_POST['libCommune']) AND !empty($_POST['codeCommune'])){
        $codecom=htmlspecialchars(strip_tags($_POST['codeCommune']));
        $libellecom=htmlspecialchars(strip_tags($_POST['libCommune']));

        
        
        try{

            ajoutercommune($codecom, $libellecom);
        

            //$_SESSION['codeCommune'] = $codeCommune;
            //$_SESSION['libellecom'] = $libellecom;

        } 
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }

        //header('Location: affichage.php');
        
        

    }else $errorMsg = "desolé la commune existe deja";

}else{

}


}
