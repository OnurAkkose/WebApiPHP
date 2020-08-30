<?php
if(isset($_SESSION["Kullanici"])){
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
	if(isset($_POST["SifreTekrar"])){
		$GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
	}else{
		$GelenSifreTekrar		=	"";
	}
	if(isset($_POST["IsimSoyisim"])){
		$GelenIsimSoyisim		=	Guvenlik($_POST["IsimSoyisim"]);
	}else{
		$GelenIsimSoyisim		=	"";
	}
	if(isset($_POST["TelefonNumarasi"])){
		$GelenTelefonNumarasi	=	Guvenlik($_POST["TelefonNumarasi"]);
	}else{
		$GelenTelefonNumarasi	=	"";
	}
	
	
	if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenIsimSoyisim!="") and ($GelenTelefonNumarasi!="")){
		if($GelenSifre!=$GelenSifreTekrar){
			echo "uyusmayan sifre";
			exit();
		}else{
			if($GelenSifre == "EskiSifre"){
				$SifreDegistirmeDurumu			=	0;
			}else{
				$SifreDegistirmeDurumu			=	1;
			}
	
			if($EmailAdresi != $GelenEmailAdresi){
				$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ?");
				$KontrolSorgusu->execute([$GelenEmailAdresi]);
				$KullaniciSayisi	=	$KontrolSorgusu->rowCount();

				if($KullaniciSayisi>0){
					echo "hata";
					exit();
				}
			}
	
			if($SifreDegistirmeDurumu == 1){
				$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE uyeler SET EmailAdresi = ?, Sifre = ?, IsimSoyisim = ?, TelefonNumarasi = ? WHERE id = ? LIMIT 1");
				$KullaniciGuncellemeSorgusu->execute([$GelenEmailAdresi, $GelenSifre, $GelenIsimSoyisim, $GelenTelefonNumarasi, $KullaniciID]);
			}else{
				$KullaniciGuncellemeSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE uyeler SET EmailAdresi = ?, IsimSoyisim = ?, TelefonNumarasi = ? WHERE id = ? LIMIT 1");
				$KullaniciGuncellemeSorgusu->execute([$GelenEmailAdresi, $GelenIsimSoyisim, $GelenTelefonNumarasi, $KullaniciID]);
			}
			
			$KayitKontrol		=	$KullaniciGuncellemeSorgusu->rowCount();

			if($KayitKontrol>0){
				$_SESSION["Kullanici"]	=	$GelenEmailAdresi;
				
				echo "güncellendi";
				exit();
			}else{
				" bilinmeyen hata";
				exit();
			}
		}
	}else{
		echo "eksik alan";
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>