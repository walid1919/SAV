<?PHP
include "../entities/probleme.php";
include "../core/ProblemeC.php";

if (isset($_POST['probleme']) and isset($_POST['id_prob'])  ){
$s=new probleme($_POST['probleme'],$_POST['id_prob']);

$sol=new ProblemeC();
$sol->ajouterProbleme($s);
header('Location: afficherProbleme.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>