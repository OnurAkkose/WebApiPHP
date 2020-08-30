<?php
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenSoruID	=	Guvenlik($_GET["ID"]);
	}else{
		$GelenSoruID	=	"";
	}
	
	


	if(($GelenSoruID!="")) {		
		$query = $db->prepare("DELETE FROM sorular WHERE id = :$GelenSoruID");
		$delete = $query->execute(array(
			'id' => $_GET['$GelenSoruID']
		));	
		
		echo "silindi";
		
			
	}else{
		echo "eksik alan";
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>