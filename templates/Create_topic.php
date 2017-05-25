<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=create_topic");
	die("");
}
    include_once("/libs/modele.php");
    include_once("/libs/maLibUtils.php");	
    include_once("/libs/maLibForms.php");
?>

<h2>Creez votre topic</h2>
<form action="controleur.php">
    <input type="text" placeholder="Titre du topic" name="title">
       <p>
       <label for="categorie">Categorie du topic</label><br />
       <select name="categorie" id="categorie">
          <option value="Informatique">Informatique</option>
           <option value="Mathematiques">Mathematiques</option>
           <option value="Industriel">Industriel</option>
           <option value="Commnunication">Commnunication</option>
           <option value="Langues">Langues</option>
           <option value="DIY">DIY</option>
           <option value="Cuisine">Cuisine</option>
           <option value="Soiree">Soiree</option>
       </select>
    </p>
    <textarea name="content" rows="10" cols="50"></textarea>
    <?php
    $id = valider("id","SESSION"); 
    $info = InfoUser($id);
    foreach($info as $element)
        $member = $element["Member_pseudo"];
    if(isset($member))
        echo '<input name="pseudo" value="'.$member.'" hidden>';
    ?>
  <input type="submit" value="Envoyez le topic" name="action"></input>
   
</form>

