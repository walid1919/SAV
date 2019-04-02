<?php

$type = $_GET['manquant'];
?>

<form action="" method="POST">
            Username: <input type="text" name="username">
            <br/>
            code cammande: <input type="text" name="idcmd">
            <br/>
            message: <textarea name="message"></textarea>
            <br/>
            <input type="submit" name="submit" value="Register"> 
</form>

<?PHP
include "../entities/reclamation.php";
include "../core/ReclamationC.php";
$date = date("Y/m/d");
$etat = 'non traite';

if(isset($_POST["submit"])){
$r=new Reclamation($_POST['username'],$_POST['idcmd'],$_POST['message'],$date,$etat,$type);
$rec=new ReclamationC();
$rec->ajouterReclamation($r);
echo '<br> <a href="afficherReclamation.php?id='.$_POST['username'].'">mes reclamations</a>';
	
}else{
	echo "vérifier les champs";
}
//*/

?>