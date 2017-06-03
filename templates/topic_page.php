<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=topic_page");
	die("");
}
$t_id = $_GET['id'];
?>

<link href="css/home_css.css" rel="stylesheet">

<?php
        if($id = valider("id", "SESSION")){
            $info = InfoUser($id);
            foreach($info as $user_element)
            $member = $user_element["Member_pseudo"]; 
        }
?>

<div class="topic">
    <div  style ="color:red; text-align: center;" class="title">
    <?php 
        $user_topic = view_topic($t_id);
        foreach($user_topic as $elements)
            $title = $elements["Topic_title"];
        echo '<h1>sujet : '.$title.'</h1>  <br/> <br/>'; 
    ?>
    </div>
    

    <div class="content">
        <?php 
        $date = date("Y-m-d H:i:s");
        echo '<div>'.$elements["Topic_content"].'</font>'.'</div>'; ?>
    </div>
</div>
<div name="decale a droite" style="position: relative; right: 85px; bottom:40px;">
    <div class='responses'>
      <div style="position: relative; left: 85px; top:30px;">  <h2>Réponses : </h2> </div>
            <div style="position: relative; bottom:55px; right:35px;">
        <?php
            $responses = get_responses($t_id);
        
            foreach($responses as $r_element){
                $reponses = $r_element["responses_content"];
                $helper = $r_element["responses_creator"];
                echo '<div class="topic_res"> <span style="color:#2AFD00;">  [ '. $helper.' ] '.'</span>'.'<br/> <br/>'.$reponses.'</div> </font>'; 
            }
        ?>
            </div>
    </div>
    
<?php 
if (valider("connecte","SESSION"))
{
?>   
    <div class="reponse">
        <form action="controleur.php">
            <!-- <textarea  name = content rows="10" cols="50" placeholder="Votre reponse"> </textarea> -->
            <div style="position: relative; right: 55px; bottom: 50px;"> <textarea name = content class="form-control" rows="5" id="comment"></textarea> </br>
            <?php
                if(isset($member))
                    echo '<input name="pseudo" value="'.$member.'" hidden>';
            ?>
            <button class="btn btn-default" type="submit" value="Répondre" name="action">Répondre</input> </button>
            <!-- <button type="submit" name="action" value="Inscription" class="btn btn-default">Inscription</button> -->
            <?php echo '<input name="id" value="'.$t_id.'" hidden>'; ?>
            </div>
        </form>
    </div>
<?php 
}

else 
{
?>
    <div class="alignmsgdeco"> <div class="alert alert-info"> <p> veuillez vous connecter pour répondre. </p> </div> </div>
<?php
}
?>
</div>
