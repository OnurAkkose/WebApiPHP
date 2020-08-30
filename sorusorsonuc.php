<?php
if(isset($_SESSION["Kullanici"])){	
		
	if(isset($_POST["aciklama"])){
		
		$GelenCevap		=	Guvenlik($_POST["aciklama"]);
	}else{
		$GelenCevap	=	"";
	}
	if(!isset($dosya)){
			
		$yukleklasor = "Resimler/sorular/";
		$tmp_name = $_FILES['resimm']['tmp_name'];
		$name = $_FILES['resimm']['name'];
		$boyut = $_FILES['resimm']['size'];
		$tip = $_FILES['resimm']['type'];
		$uzanti = substr($name,-4,4);
		$rastgelesayi1 = rand(10000,50000);
		$rastgelesayi2 = rand(10000,50000);
		$resimad = $rastgelesayi1.$rastgelesayi2.$uzanti;
		

		/*kontroller*/
		if(strlen($name) == 0){
			echo "bir dosya seçiniz";
			exit();
		}
		/*boyut kontrol*/

		if($boyut > (1024*1024*3)){
			echo "dosya boyutu çok fazla";
			exit();
		}
		/*tip kontrolü*/
		if($tip != "image/jpeg" && $tip != "image/png" && $uzanti != "image/jpg"){
			echo "Yalnızca jpeg veya png formatında dosya yükleyebilirsiniz.";
		}
		move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
	}else{
		
		$resimad	=	"";
	}
	if(isset($_POST["lessons"])){
		$Lessons	=	Guvenlik($_POST["lessons"]);
		

	}else{
		$Lessons		=	"";
	}



	if(($GelenCevap!="" && $tmp_name != "")) {
		$YorumKayitSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO sorular (UyeIsimSoyisim, UyeId, SoruTuru, SoruAciklama, SoruResim) values (?, ?, ?, ?, ?)");
		$YorumKayitSorgusu->execute([$IsimSoyisim, $KullaniciID, $Lessons, $GelenCevap, $resimad]);
		$YorumKayitKontrol		=	$YorumKayitSorgusu->rowCount();
		
		
			
	}else{
		echo "eksik alan";
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>

<div class="ickisim" style="text-align: center;">
	<img src="Resimler/onay.jpg">
	<h3>Sorunuz paylaşıldı</h3>
	<p><b>Soru Havuzunu inceleyebilirsiniz.</b></p>

</div>
<div style="height:100px;" ></div>