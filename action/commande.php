<?php
require("action/database.php");
///////////////////////////////////////////////////
function ajouterclient($numcli, $codecom, $raisonsocial, $telcli, $addrpostalcli, $emailcli){

    if(require("action/database.php")){
        $req=$bdd->prepare("INSERT INTO CLIENT(NUMCLI, CODECOM, RAISONSOCIALECLI, TELCLI, ADRESSEPOSTALECLI, EMAILCLI) VALUES (?,?,?,?,?,?)");

        $req->execute(array($numcli, $codecom, $raisonsocial, $telcli, $addrpostalcli, $emailcli));

        $req->closeCursor();
    }

}

function ajoutercommune($codecom, $libellecom){

    if(require("action/database.php")){
        $req=$bdd->prepare("INSERT INTO COMMUNE(CODECOM, LIBELLECOM) VALUES (?,?)");

        $req->execute(array($codecom, $libellecom ));

        $req->closeCursor();
    }

}



function affichercommune(){
    if(require("action/database.php")){
        $req=$bdd->prepare("SELECT * FROM COMMUNE ");
        $req->execute();

        $data = $req->fetchAll(PDO:: FETCH_OBJ);

        return $data;

        $req->closeCursor();

        

    }
}

/*
function supprimercommune($codecom){
    if(require("action/database.php")){
        $req = $bdd->prepare("DELETE  FROM COMMUNE WHERE CODECOM =? ");

        $req->execute(array($codecom));
    }
}
*/