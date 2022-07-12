<?php include("head.php");
      include("nav_index.php");
      include("action/commande.php");
      $afficheur = affichercommune();
?>
<div class="container mt-5">
        <div class="d-flex">
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><b>Numéro</b></label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                        <div class="mb-3"> 
                           <label for="validationCustom04">Code Commune</label>
                          
                           <select class="custom-select"  name="codeCommune" required>
                           
                           <option selected disabled value="">Selectioner</option>
                               
                           <?php foreach($afficheur as $afficheur): ?>
                               <option value="<?=$afficheur->CODECOM?>"><?=$afficheur->CODECOM?></option>
                              </select>
                           <?php endforeach; ?>
                        </div>
             
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><b>Numéro</b></label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label"><b>Raison social</b></label>
                      <input type="Text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><b>Téléphone</b></label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><b>cellulaire</b></label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label"><b>Adresse Postale</b></label>
                      <input type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
























<?php
include("footer.php");
?>