<?php
/*
  Author : Mohamed Aimane Skhairi
  Email : skhairimedaimane@gmail.com
  Repo : https://github.com/medaimane/crud-php-pdo-bootstrap-mysql
*/

class crud // la class des operations avec la base de données.
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($fname,$lname,$email,$contact,$addr,$email2) // methode d'insertion des données.
	{
		try
		{
			// préparation de la requete :
			$stmt = $this->db->prepare(
				"INSERT INTO CLIENT(NUMCLI,CODECOM,RAISONSOCIALECLI,TELCLI,ADRESSEPOSTALECLI,EMAILCLI) 
						VALUES(:fname, :lname, :email, :contact, :addr, :email2)");
			// affectations des valeurs :
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
			$stmt->bindparam(":addr",$addr);
			$stmt->bindparam(":email2",$email2);
			// execution de la reqeute :
			return $stmt->execute();
		}
		catch(PDOException $e) // l'utilisation de "try catch" pour vérifier si on a des erreurs, 
		{					   // et afficher des messages.
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($id)  // return les informations de l'utilisateur qui est équivalant à l'id entré aux paramétre. 
	{
		$stmt = $this->db->prepare("SELECT * FROM CLIENT WHERE NUMCLI=:NUMCLI"); // preparation de la requete sql avec l'id.
		$stmt->execute(array(":NUMCLI"=>$id)); // execution de la requete.
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC); // affectation de la la résultat (un ligne de tableau). 
		return $editRow;
	}

	// modification d'un utilisateur avec tous les champs.
	public function update($id,$fname,$lname,$email,$contact,$addr,$email2)
	{
		try
		{
			// préparation de la requete :
			$stmt=$this->db->prepare("UPDATE CLIENT SET NUMCLI=:fname, 
		                                               CODECOM=:lname, 
													   RAISONSOCIALECLI=:email, 
													   TELCLI=:contact,
													   ADRESSEPOSTALECLI=:addr,
													   EMAILCLI=:email2
													WHERE NUMCLI=:NUMCLI ");
			// affectation des valeurs :
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
			$stmt->bindparam(":addr",$addr);
			$stmt->bindparam(":email2",$email2);
			$stmt->bindparam(":NUMCLI",$id);
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
	
	public function delete($id) // suppression d'un utilisateur par l'id.
	{
		$stmt = $this->db->prepare("DELETE FROM CLIENT WHERE NUMCLI=:NUMCLI"); // préparation.
		$stmt->bindparam(":NUMCLI",$id); // affectation du valeur
		$stmt->execute(); // execution 
		return true; // toujoure on retourne true or false pour 
	}                // l'utiliation aprés dans les autres pages.
	
		
	public function dataview($query) // l'affichage des données, on passe en paramétre une requete.
	{
		$stmt = $this->db->prepare($query); // préparation de la requete 
		$stmt->execute(); // exectuion de la requete	
		if($stmt->rowCount() > 0) // teste sur le nembres des ligne retourner, 
		{	// si il y a des ligne on va l'afficher :
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) // tant qu'on a la ligne, on affecte ce ligne 
			{									       // et on affiche ce ligne sur le tableau html 
				?>
                <tr>
                	<td><?php print($row['NUMCLI']); ?></td> <!--utilisation de print pour l'affichage de id pour ce ligne-->
                	<td><?php print($row['CODECOM']); ?></td><!--affichage de nome-->
                	<td><?php print($row['RAISONSOCIALECLI']); ?></td><!--affichage de prénom-->
                	<td><?php print($row['TELCLI']); ?></td><!--affichage de email-->
                	<td><?php print($row['ADRESSEPOSTALECLI']); ?></td><!--affichage de tél-->
                	<td><?php print($row['EMAILCLI']); ?></td>
					
					<td align="center">
					<!--ici on va crée par l'id de la ligne courant, un lien vers la page de modification-->
                	<a href="edit-data.php?edit_id=<?php print($row['NUMCLI']); ?>">
					<i class="glyphicon glyphicon-edit"></i> <!--utilisation d'une icone de bootstrap-->
					</a>
                	</td>
                	<td align="center">
					<!--ici on va crée par l'id de la ligne courant, un lien vers la page de suppression-->
                	<a href="delete.php?delete_id=<?php print($row['NUMCLI']); ?>">
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
            <td>Liste vide...</td><!--on affiche la table vide-->
            </tr>
            <?php
		}
	}


/*
	public function affichage($query) // l'affichage des données, on passe en paramétre une requete.
	{
		$stmt = $this->db->prepare($query); // préparation de la requete 
		$stmt->execute(); // exectuion de la requete	
		if($stmt->rowCount() > 0) // teste sur le nembres des ligne retourner, 
		{	// si il y a des ligne on va l'afficher :
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) // tant qu'on a la ligne, on affecte ce ligne 
			{									       // et on affiche ce ligne sur le tableau html 
				?>
                <tr>
                	 <!--utilisation de print pour l'affichage de id pour ce ligne-->
                	<td><?php print($row['CODECOM']); ?></td><!--affichage de nome-->
                </tr>
                <?php
			}
		}
		else // si on a aucune ligen sur la table de la base de donées,
		{
			?>
            <tr>
            <td>Acune utilisateur...</td><!--on affiche la table vide-->
            </tr>
            <?php
		}
	}

	*/
	public function query($sql, $data = array()){
	$req =$this->db->prepare($sql);
	$req->execute($data);
	return $req->fetchAll(PDO::FETCH_OBJ);
	
}
	



		
}
?>