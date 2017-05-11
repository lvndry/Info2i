<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


function listerUtilisateurs($classe = "both")
{
	// NB : la présence du symbole '=' indique la valeur par défaut du paramètre s'il n'est pas fourni
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,connecte,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$SQL = "select * from users";
	if ($classe == "bl")
		$SQL .= " where blacklist=1";
	if ($classe == "nbl")
		$SQL .= " where blacklist=0";
	
	// echo $SQL;
	return parcoursRs(SQLSelect($SQL));
}


function interdireUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "UPDATE users SET blacklist=1 WHERE id='$idUser'";
	// les apostrophes font partie de la sécurité !! 
	// Il faut utiliser addslashes lors de la récupération 
	// des données depuis les formulaires

	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE users SET blacklist=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id_user FROM users WHERE pseudo='$login' AND mdp='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function recupInfoUser($info,$id)
{

	$SQL = "SELECT $info FROM users WHERE id_user = '$id' ";

	return SQLGetChamp($SQL);

}

function enregistrement($pseudo, $prenom, $nom, $promo, $mdp, $email)
{
	$SQL = "INSERT INTO users(pseudo, mdp, promo, prenom, nom, email) VALUES('$pseudo', '$mdp', '$promo', '$prenom', '$nom', '$email')";

	return SQLInsert($SQL);
}

function SignVerifUser($pseudo, $email)
{
	$SQL = "SELECT email FROM users WHERE pseudo = '$pseudo' OR email = '$email' ";

	return SQLGetChamp($SQL);
}


function btnfriend($iduser, $idother)
{
	$SQL = "SELECT id FROM amis WHERE idU1 = '$iduser' AND idU2 = '$idother'";

	return SQLGetChamp($SQL);
}

function createfriend($id1, $id2)
{
	$SQL = "INSERT INTO amis( idU1, idU2) VALUES( $id1, $id2)";

	return SQLInsert($SQL);
}

function searchFriendship($idother)
{
	$SQL = " SELECT idU2 FROM amis WHERE idU1 = '$idother' ";

	return SQLSelect($SQL);
}

function modifInfos($infos, $valeur, $id)
{

	$SQL = " UPDATE users SET $infos = '$valeur' WHERE id_user = $id ";

	return SQLUpdate($SQL);
}

function envoie_mess($id_exp, $id_dest, $message)
{
	$SQL = "INSERT INTO messages(id_destinataire, id_expediteur, message) VALUES('$id_dest', '$id_exp', '$message')";

	return SQLInsert($SQL);
}

function recherche_message($id_exp, $id_dest)
{
	$SQL = "SELECT id_expediteur, message, datet FROM messages WHERE (id_destinataire = $id_exp AND id_expediteur =$id_dest) OR (id_destinataire = $id_dest AND id_expediteur = $id_exp)  ORDER BY id ASC";

	return SQLSelect($SQL);
}

function recupInfoGroupe($info,$id)
{

	$SQL = "SELECT $info FROM groupes WHERE id = '$id' ";

	return SQLGetChamp($SQL);

}

function search_groupe($iduser)
{
	$SQL = "SELECT id FROM groupes WHERE id_membres LIKE '%,$iduser,%'  ";

	return SQLSelect($SQL);
}

function bool_membre_groupe($iduser, $id_groupe)
{
	$SQL = "SELECT id FROM groupes WHERE id_membres LIKE '%,$iduser,%' AND id = $id_groupe";

	return SQLGetChamp($SQL);
}

function recuperer_membre($groupe)
{
	$SQL = "SELECT id_membres FROM groupes WHERE id = $groupe";

	return SQLGetChamp($SQL);
}

function ajout_membre($newmembre, $id_groupe)
{
	$SQL = "UPDATE groupes SET id_membres = '$newmembre' WHERE id = $id_groupe ";

	return SQLUpdate($SQL);
}

function recherche_message_groupe($id_groupe)
{
	$SQL = "SELECT message, id_expediteur, datet FROM message_groupe WHERE id_groupe = $id_groupe";

	return SQLSelect($SQL);
}

function envoie_mess_groupe($id_exp, $id_groupe, $message)
{
	$SQL = "INSERT INTO message_groupe(id_groupe, id_expediteur, message) VALUES('$id_groupe', '$id_exp', '$message')";

	return SQLInsert($SQL);
}

function creer_groupe($nom_groupe, $membre)
{
	$SQL = "INSERT INTO groupes (nom_groupe, id_membres) VALUES ('$nom_groupe', '$membre')";

	return SQLInsert($SQL);
}

function verifFriendship($iduser, $idother)
{
	$SQL = "SELECT id FROM amis WHERE idU1 = $iduser AND idU2 = $idother";

	return SQLGetChamp($SQL);
}

function verif_membre_groupe($idgroupe, $iduser)
{
	$SQL = "SELECT nom_groupe FROM groupes WHERE id_membres LIKE '%,$iduser,%' AND id = $idgroupe ";

	return SQLGetChamp($SQL);
}

function search_friend_promo($promo)
{
	$SQL = "SELECT prenom, nom, pseudo, id_user FROM users WHERE promo = '$promo' ";

	return SQLSelect($SQL);
}

function search_friend_other_promo($promo)
{
	$SQL = "SELECT prenom, nom, pseudo, id_user FROM users WHERE promo != '$promo' ";

	return SQLSelect($SQL);
}

function searchfriend($pseudo)
{
	$SQL = "SELECT id_user, prenom, nom, promo FROM users WHERE pseudo LIKE '%$pseudo%' ";

	return SQLSelect($SQL);
}

function supprimerGroupe($idgroupe)
{

	$SQL = "DELETE FROM groupes WHERE id ='$idgroupe'";

	SQLDelete($SQL);

	$SQL = "DELETE FROM message_groupe WHERE id_groupe = '$idgroupe'";

	SQLDelete($SQL);
}

function supprimerCompte($id)
{
	$SQL = "DELETE FROM users WHERE id_user = '$id' ";

	SQLDelete($SQL);

	$SQL = "DELETE FROM message_groupe WHERE id_expediteur = '$id' ";

	SQLDelete($SQL);

	$SQL = "DELETE FROM messages WHERE id_expediteur = '$id' OR id_destinataire = '$id' ";

	SQLDelete($SQL);

	$SQL = "DELETE FROM amis WHERE idU1 = '$id' OR idU2 = '$id' ";

	SQLDelete($SQL);
}

function supprimerAmitier($idprofil, $idsession)
{
	$SQL = "DELETE FROM amis WHERE idU1 = '$idprofil' AND idU2 = '$idsession' OR idU2 = '$idprofil' AND idU1 = '$idsession' ";

	SQLDelete($SQL);
}

function new_topic($title , $content){
    $SQL = "INSERT INTO test(post_name, post_content) VALUES ('$title', '$content')";
    
    return SQLInsert($SQL);
}

function recup_topic($id){
    $SQL = "SELECT post_content, post_name from test where post_id = '$id' OR post_id = '6' ";
    
    return SQLSelect($SQL);
}


?>