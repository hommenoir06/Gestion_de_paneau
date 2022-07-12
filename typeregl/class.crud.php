<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

class crud // la class des operations avec la base de données.
{
	private $bdd;
	
	function __construct($BD_con)
	{
		$this->bdd = $BD_con;
	}
	
	public function create($codetypereg,$libelletypereg) // methode d'insertion des données.
	{
		try
		{
			// préparation de la requete :
			$stmt = $this->bdd->prepare(
				"INSERT INTO TYPE_REGLEMENT(CODETYPEREG,LIBELLETYPEREG) 
						VALUES(:CODETYPEREG, :LIBELLETYPEREG)");
			// affectations des valeurs :
			$stmt->bindparam(":CODETYPEREG",$codetypereg);
			$stmt->bindparam(":LIBELLETYPEREG",$libelletypereg);
			// execution de la reqeute :
			return $stmt->execute();
		}
		catch(PDOException $e) // l'utilisation de "try catch" pour vérifier si on a des erreurs, 
		{					   // et afficher des messages.
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($codetypereg)  // return les informations de l'utilisateur qui est équivalant à l'codetypereg entré aux paramétre. 
	{
		$stmt = $this->bdd->prepare("SELECT * FROM TYPE_REGLEMENT WHERE CODETYPEREG=:CODETYPEREG"); // preparation de la requete sql avec l'codetypereg.
		$stmt->execute(array(":CODETYPEREG"=>$codetypereg)); // execution de la requete.
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC); // affectation de la la résultat (un ligne de tableau). 
		
		return $editRow;
		
	}

	// modification d'un utilisateur avec tous les champs.
	public function update($codetypereg,$libelletypereg)
	{
		try
		{
			// préparation de la requete :
			$stmt=$this->bdd->prepare("UPDATE TYPE_REGLEMENT SET LIBELLETYPEREG=:LIBELLETYPEREG WHERE CODETYPEREG=:CODETYPEREG");
			// affectation des valeurs :
			$stmt->bindparam(":CODETYPEREG",$codetypereg);
			$stmt->bindparam(":LIBELLETYPEREG",$libelletypereg );
			// execution de la requete :
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e) // vérification des erreurs.
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($codetypereg) // suppression d'un utilisateur par l'codetypereg.
	{
		$stmt = $this->bdd->prepare("DELETE FROM TYPE_REGLEMENT WHERE CODETYPEREG=:CODETYPEREG"); // préparation.
		$stmt->bindparam(":CODETYPEREG",$codetypereg); // affectation du valeur
		$stmt->execute(); // execution 
		return true; // toujoure on retourne true or false pour 
	}                // l'utiliation aprés dans les autres pages.
	
		
	public function dataview($query) // l'affichage des données, on passe en paramétre une requete.
	{
		$stmt = $this->bdd->prepare($query); // préparation de la requete 
		$stmt->execute(); // exectuion de la requete	
		if($stmt->rowCount() > 0) // teste sur le nembres des ligne retourner, 
		{	// si il y a des ligne on va l'afficher :
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) // tant qu'on a la ligne, on affecte ce ligne 
			{									       // et on affiche ce ligne sur le tableau html 
				?>
                <tr>
                	<td><?php print($row['CODETYPEREG']); ?></td> <!--utilisation de print pour l'affichage de codetypereg pour ce ligne-->
                	<td><?php print($row['LIBELLETYPEREG']); ?></td><!--affichage de nome-->
                	<td align="center">
					<!--ici on va crée par l'codetypereg de la ligne courant, un lien vers la page de modification-->
                	<a href="edit-data.php?edit_id=<?php print($row['CODETYPEREG']); ?>">
					<i class="glyphicon glyphicon-edit"></i> <!--utilisation d'une icone de bootstrap-->
					</a>
                	</td>
                	<td align="center">
					<!--ici on va crée par l'codetypereg de la ligne courant, un lien vers la page de suppression-->
                	<a href="delete.php?delete_id=<?php print($row['CODETYPEREG']); ?>">
					<i class="glyphicon glyphicon-remove-circle"></i><!--utilisation d'une icone de bootstrap-->
					</a>
                	</td>
                </tr>
                <?php
			}
		}
		else // si on a aucune ligen sur la table de la base de donées,
		{
			?>
            <tr>
            <td>Acune utilisateur...</td><!--on affiche la table vcodetyperege-->
            </tr>
            <?php
		}
	}	

}

?>