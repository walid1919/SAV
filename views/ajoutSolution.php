<?PHP
include "../entities/solution.php";
include "../core/SolutionC.php";

if (isset($_POST['id_sol']) and isset($_POST['id_prob']) and isset($_POST['solution']) ){
$s=new solution($_POST['id_sol'],$_POST['id_prob'],$_POST['solution']);

$sol=new SolutionC();
$sol->ajouterSolution($s);
header('Location: afficherSolution.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>