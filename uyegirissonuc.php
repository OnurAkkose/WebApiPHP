<?php
if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}




if(($GelenEmailAdresi!="") and ($GelenSifre!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND Sifre = ?");
	$KontrolSorgusu->execute([$GelenEmailAdresi, $GelenSifre]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
	
		if($KullaniciSayisi>0){
			
			if($KullaniciKaydi["Durumu"]==0){
			$_SESSION["Kullanici"]	=	$GelenEmailAdresi;
			
			if($_SESSION["Kullanici"]==$GelenEmailAdresi){
				header("Location:index.php?SK=3");
				exit();
			}else{
				echo "Hatalı Giriş";
				exit();
			}
		}
		
	}
}else{
	echo "Burada";
}
?>