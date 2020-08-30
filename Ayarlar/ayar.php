<?php

try{
	$VeritabaniBaglantisi	=	new PDO("mysql:host=localhost;dbname=soruPaylasim;charset=UTF8", "root", "");
}catch(PDOException $Hata){
	//echo "Bağlantı Hatası<br />" . $Hata->getMessage(); // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
	die();
}

$AyarlarSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ayarlar LIMIT 1");
$AyarlarSorgusu->execute();
$AyarSayisi			=	$AyarlarSorgusu->rowCount();
$Ayarlar			=	$AyarlarSorgusu->fetch(PDO::FETCH_ASSOC);



if($AyarSayisi>0){
	$SiteAdi				=	$Ayarlar["SiteAdi"];
	$SiteTitle				=	$Ayarlar["SiteTitle"];
	$SiteDescription		=	$Ayarlar["SiteDescription"];
	$SiteKeywords			=	$Ayarlar["SiteKeywords"];
	$SiteCopyrightMetni		=	$Ayarlar["SiteCopyrightMetni"];
	$SiteLogosu				=	$Ayarlar["SiteLogosu"];
		
}else{
	//echo "Site Ayar Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
	die();
}
if(isset($_SESSION["Kullanici"])){
	$KullaniciSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? LIMIT 1");
	$KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
	$KullaniciSayisi		=	$KullaniciSorgusu->rowCount();
	$Kullanici				=	$KullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){
		$KullaniciID		=	$Kullanici["id"];
		$EmailAdresi		=	$Kullanici["EmailAdresi"];
		$Sifre				=	$Kullanici["Sifre"];
		$IsimSoyisim		=	$Kullanici["IsimSoyisim"];
		$TelefonNumarasi	=	$Kullanici["TelefonNumarasi"];		
		$Durumu				=	$Kullanici["Durumu"];
		$KayitTarihi		=	$Kullanici["KayitTarihi"];
		$KayitIpAdresi		=	$Kullanici["KayitIpAdresi"];
			
	}else{
		//echo "Kullanıcı Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
}













?>