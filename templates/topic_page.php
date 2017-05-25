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
    <div class="title">
    <?php 
        $user_topic = view_topic($t_id);
        foreach($user_topic as $elements)
            $title = $elements["Topic_title"];
        echo '<h2>'.$title.'</h2>';
    ?>
    </div>
    
    <div class="content">
        <?php echo'<div>'.$elements["Topic_content"].'</div>'; ?>
    </div>
</div>
    <div class='responses'>
       <h3>Reponses</h3>
        <?php
            $responses = get_responses($t_id);
        
            foreach($responses as $r_element){
                $reponses = $r_element["responses_content"];
                $helper = $r_element["responses_creator"];
                echo '<div class="topic_res">['.$helper.'] '.$reponses.'</div>'; 
            }
        ?>
    </div>
    
<div class="reponse">
    <form action="controleur.php">
        <textarea  name = content rows="10" cols="50" placeholder="Votre reponse"> </textarea>
        <?php
            if(isset($member))
                echo '<input name="pseudo" value="'.$member.'" hidden>';
        ?>
        <input type="submit" value="Reponse" name="action"></input>
        <?php echo '<input name="id" value="'.$t_id.'" hidden>'; ?>
        
    </form>
</div>


