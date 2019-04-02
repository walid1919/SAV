<?PHP
include "../config.php";
class ReclamationC {
function afficherReclamation ($s){
		echo "id_rec: ".$s->getIdRec()."<br>";
		echo "id_cmd: ".$s->getIdCmd()."<br>";
		echo "id_clt: ".$s->getIdClt()."<br>";
        echo "contenue: ".$s->getContenue()."<br>";
		echo "date: ".$s->getDate()."<br>";
        echo "etat: ".$s->getEtat()."<br>";
		echo "type: ".$s->getType()."<br>";

		
	}
	
	function ajouterReclamation($s){
		$sql="INSERT INTO reclamation (id_Cmd, id_Clt, contenue, type, Date, etat) values ( :id_Cmd,:id_Clt,:contenue,:type,:date,:etat)";
        
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_cmd=$s->getIdCmd();
        $id_clt=$s->getIdClt();
        $contenue=$s->getContenue();
        $date=$s->getDate();
        $etat=$s->getEtat();
        $type=$s->getType();

		
		$req->bindValue(':id_Cmd',$id_cmd);
		$req->bindValue(':id_Clt',$id_clt);
        $req->bindValue(':contenue',$contenue);
		$req->bindValue(':date',$date);
		$req->bindValue(':etat',$etat);
        $req->bindValue(':type',$type);
        

            $req->execute();
        echo 'tzedt';
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherReclamations()
    {	
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerReclamation($id_Rec){
		$sql="DELETE FROM reclamation where id_Rec= :id_Rec";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_Rec',$id_Rec);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierReclamation($s,$id_Rec){
		$sql="UPDATE reclamation SET  id_Clt=:id_Clt,Date=:date,id_Cmd=:id_cmd,etat=:etat,type=:type,contenue=:contenue WHERE id_Rec=:id_rec";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $id_Clt=$s->getIdClt();
        $id_Cmd=$s->getIdCmd();
        $contenue=$s->getContenue();
        $type=$s->getType();
        $date=$s->getDate();
        $etat=$s->getEtat();
        
		$datas = array( ':id_Cmd'=>$id_Cmd, ':id_Clt'=>$id_Clt , ':contenue'=>$contenue, ':date'=>$date,':etat'=>$etat,':type'=>$type);
		$req->bindValue(':id_cmd',$id_Cmd);
		$req->bindValue(':id_Clt',$id_Clt);
		$req->bindValue(':date',$date);
    	$req->bindValue(':contenue',$contenue);
    	$req->bindValue(':etat',$etat);
    	$req->bindValue(':type',$type);
    	$req->bindValue(':id_rec',$id_Rec);

		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererReclamation($id_rec){
		$sql="SELECT * from reclamation where id_Rec=$id_rec";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>