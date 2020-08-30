<?php
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenSoruID	=	Guvenlik($_GET["ID"]);
	}else{
		$GelenSoruID	=	"";
	}
	
	if(isset($_POST["aciklama"])){
		$GelenCevap		=	Guvenlik($_POST["aciklama"]);
	}else{
		$GelenCevap	=	"";
	}
	if(!isset($dosya)){
			
		$yukleklasor = "Resimler/cevaplar/";
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


	if(($GelenSoruID!="")) {
		$YorumKayitSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO cevaplar (SoruId, Uye, CevapMetni, CevapTarihi, CevapResmi, CevapIpAdresi) values (?, ?, ?, ?, ?, ?)");
		$YorumKayitSorgusu->execute([$GelenSoruID, $IsimSoyisim, $GelenCevap, $TarihSaat, $resimad, $IPAdresi]);
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
	<h3>Cevabınız kaydedildi.</h3>
	
</div>
<div style="height:100px;" ></div>