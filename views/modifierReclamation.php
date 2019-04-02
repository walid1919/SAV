<html>
<head>
</head>
<body>
<?PHP
include "../entities/reclamation.php";
include "../core/ReclamationC.php";
if (isset($_GET['Id'])){

	$s=new ReclamationC();
    $result=$s->recupererReclamation($_GET['Id']);
	foreach($result as $row){
		
		$id_Rec=$row['id_Rec'];
		$message=$row['contenue'];
        $type = $row['type'];
		$id_clt= $row['id_Clt'];
        $id_cmd = $row['id_Cmd'];
        $date = $row['Date'];
        $etat = $row['etat'];
?>
<form method="POST">
<table>
<caption>Modifier Reclamation</caption>

<tr>
<td>type</td>
<td><input type="text" name="type" value="<?PHP echo $type ?>"></td>
</tr>
<tr>
<td>message</td>
<td><input type="text" name="message" value="<?PHP echo $message ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_Rec_ini" value="<?PHP echo $id_Rec;?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$ss=new reclamation($id_clt,$id_cmd,$_POST['message'],$date,$etat,$_POST['type']);
 
	$s->modifierReclamation($ss,$_POST['id_Rec_ini']);
	//header('Location: afficherReclamation.php?id='.$_GET['Id_c']);
}
?>
</body>
</html>