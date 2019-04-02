<?PHP
include "../core/ProblemeC.php";
$probC=new ProblemeC();
$liste=$probC->afficherProblemes();

?>


<?PHP
foreach($liste as $row)
{
	?>
    
    
     <a href="afficherSolution.php?id_prob=<?php echo $row['id_prob'];?>">
    <button  class="choix"><?php echo $row[1]; ?></button></a>
                        <br>
    
    
<?PHP
}
?>


