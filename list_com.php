<?php
require("head.php");
require("nav_index.php");
include("action/commande.php");
$afficheur = affichercommune();
?>
<div class="container">
</br>
      <h3 class="tex-center">INFOMATION PERSONNEL CLIENT DU PERSONNELLE</h3>
</br>
        <?php foreach($afficheur as $afficheur): ?>     
      
      <table class="table">
        <thead>
          <tr>
            <th>code commune</th>
            <th>libelle commune</th>
            <th>Actions</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $afficheur->CODECOM ?></td>
            <td><?= $afficheur->LIBELLECOM ?></td>
            <td>
                <button type="submit" class="btn btn-primary">Modifier</button></button>
                <button type="submit" class="btn btn-danger" name="valider">Supprimer</button>
            </td>
          </tr>
          
        </tbody>
      </table>
    <?php endforeach; ?>
    </div>


























<?php
 include("footer.php");
?>