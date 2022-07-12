<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

class crud // la class des operations avec la base de données.
{
	private $dbb;
	
	function __construct($DB_con)
	{
		$this->dbb = $DB_con;
	}
	
	public function create($codecom,$libellecom) // methode d'insertion des données.
	{
		try
		{
			// préparation de la requete :
			$stmt = $this->dbb->prepare(
				"INSERT INTO COMMUNE(CODECOM,LIBELLECOM) 
						VALUES(:CODECOM, :LIBELLECOM)");
			// affectations des valeurs :
			$stmt->bindparam(":CODECOM",$codecom);
			$stmt->bindparam(":LIBELLECOM",$libellecom);
			// execution de la reqeute :
			return $stmt->execute();
		}
		catch(PDOException $e) // l'utilisation de "try catch" pour vérifier si on a des erreurs, 
		{					   // et afficher des messages.
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($codecom)  // return les informations de l'utilisateur qui est équivalant à l'codecom entré aux paramétre. 
	{	
		$stmt = $this->dbb->prepare("SELECT * FROM COMMUNE WHERE CODECOM=:CODECOM"); // preparation de la requete sql avec l'codecom.
		$stmt->execute(array(":CODECOM"=>$codecom)); // execution de la requete.
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC); // affectation de la la résultat (un ligne de tableau). 
		//var_dump($editRow);  
		return $editRow;
	}

	// modification d'un utilisateur avec tous les champs.
	public function update($codecom,$libellecom)
	{
		try
		{
			// préparation de la requete :
			$stmt=$this->dbb->prepare("UPDATE COMMUNE SET  LIBELLECOM=:LIBELLECOM WHERE CODECOM=:CODECOM ");
			// affectation des valeurs :
			
			$stmt->bindparam(":LIBELLECOM",$libellecom);
			$stmt->bindparam(":CODECOM",$codecom);
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
	
	public function delete($codecom) // suppression d'un utilisateur par l'codecom.
	{
		$stmt = $this->dbb->prepare("DELETE FROM COMMUNE WHERE CODECOM=:CODECOM"); // préparation.
		$stmt->bindparam(":CODECOM",$codecom); // affectation du valeur
		$stmt->execute(); // execution 
		return true; // toujoure on retourne true or false pour 
	}                // l'utiliation aprés dans les autres pages.
	
		
	public function dataview($query) // l'affichage des données, on passe en paramétre une requete.
	{
		$stmt = $this->dbb->prepare($query); // préparation de la requete 
		$stmt->execute(); // exectuion de la requete	
		if($stmt->rowCount() > 0) // teste sur le nembres des ligne retourner, 
		{	// si il y a des ligne on va l'afficher :
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) // tant qu'on a la ligne, on affecte ce ligne 
			{									       // et on affiche ce ligne sur le tableau html 
				?>
                <tr>
                	<td><?php print($row['CODECOM']); ?></td> <!--utilisation de print pour l'affichage de codecom pour ce ligne-->
                	<td><?php print($row['LIBELLECOM']); ?></td><!--affichage de nome-->
                	<td  class="text-center">
					<!--ici on va crée par l'codecom de la ligne courant, un lien vers la page de modification-->
                	<a href="edit-data.php?edit_id=<?php print($row['CODECOM']); ?>">
					<i class="glyphicon glyphicon-edit"></i> <!--utilisation d'une icone de bootstrap-->
					</a>
                	</td>
                	<td  class="text-center">
					<!--ici on va crée par l'codecom de la ligne courant, un lien vers la page de suppression-->
                	<a href="delete.php?delete_id=<?php print($row['CODECOM']); ?>">
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
            <td>Liste vide...</td><!--on affiche la table vcodecome-->
            </tr>
            <?php
		}
	}	
}
?>