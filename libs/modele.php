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

	$SQL = "select * from members";
	if ($classe == "bl")
		$SQL .= " where blacklist=1";
	if ($classe == "nbl")
		$SQL .= " where blacklist=0";

	$SQL .= " ORDER BY valide ASC";
	
	// echo $SQL;
	return parcoursRs(SQLSelect($SQL));

}

function validerUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "UPDATE members SET valide=1 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function supprimerUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "DELETE FROM members WHERE id='$idUser'";
	SQLDelete($SQL);
}

function interdireUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "UPDATE members SET blacklist=1 WHERE id='$idUser'";
	// les apostrophes font partie de la sécurité !! 
	// Il faut utiliser addslashes lors de la récupération 
	// des données depuis les formulaires

	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE members SET blacklist=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	  // dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT Member_id FROM members WHERE Member_pseudo='$login' AND Member_passwd='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function creerUser($login,$passe,$email) {
  if($login!="" && $passe!="" && $email!="")
  {	
	if (!DoublonLogin($login)) 
	{
			if(!doublonEmail($email)) 
			{

				$SQL = "INSERT INTO members(Member_pseudo,Member_passwd,Member_email) VALUES ('$login','$passe','$email')";
			
	

	return SQLInsert($SQL); 
			}
			else{
				return"email"; 
			}	
	}
	else{
		return "login"; 
	}
  } 
  //renvoie l'id de l'utilisateur créé 
}

function isValid($id) {
	$SQL = "SELECT valide FROM members WHERE id='$id'"; 
	return SQLGetChamp($SQL);

	// equivalent à 
	// $tabR = parcoursRs(SQLSelect($SQL))
	// return $tabR[0]["valide"];
}

function isAdmin($id) {
	$SQL = "SELECT admin FROM members WHERE id='$id'"; 
	return SQLGetChamp($SQL);

	// equivalent à 
	// $tabR = parcoursRs(SQLSelect($SQL))
	// return $tabR[0]["valide"];
}

function DoublonLogin($login) {
//verifie que le login entré n'existe pas déjà dans la base de données
	$SQL="SELECT Member_pseudo FROM members WHERE Member_pseudo='$login'";
	return SQLGetChamp($SQL);
}

function doublonEmail($email)
{
	//verifie que l'adresse email entré n'existe pas déjà dans la base de données
	$SQL="SELECT Member_email FROM members WHERE Member_email='$email'";
	return SQLGetChamp($SQL);
}

function last_topics(){
    $SQL  = "SELECT * FROM (SELECT * FROM topic ORDER BY Topic_id DESC LIMIT 5) sub ORDER BY Topic_id ASC";
        
        return parcoursRs(SQLSelect($SQL));
}

function last_cat_topics($categorie){
     $SQL  = "SELECT * FROM (SELECT * FROM topic where Topic_genre = '$categorie' ORDER BY Topic_id DESC LIMIT 5) sub ORDER BY Topic_id ASC";
     
    return parcoursRs(SQLSelect($SQL));
}

?>
