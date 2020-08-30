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

if($GelenSifre!=$GelenSifreTekrar){
	echo "<script type='text/javascript'>alert('Şifreler eşleşmiyor');</script>";

}else{
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ?");
	$KontrolSorgusu->execute([$GelenEmailAdresi]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
		
	if($KullaniciSayisi>0){
		echo "<script type='text/javascript'>alert('Bu emaile ait bir üyelik zaten var');</script>";
		
		exit();
	}
	else{
		$UyeEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO uyeler (EmailAdresi, Sifre, IsimSoyisim, TelefonNumarasi,  KayitIpAdresi,KayitTarihi,Durumu) values (?, ?, ?, ?, ?, ?, ?)");
		$UyeEklemeSorgusu->execute([$GelenEmailAdresi, $GelenSifre, $GelenIsimSoyisim, $GelenTelefonNumarasi, 0, $ZamanDamgasi, $IPAdresi]);
		$KayitKontrol		=	$UyeEklemeSorgusu->rowCount();
		
	}
}



?>
<div class="ickisim" style="text-align: center;">
	<img src="Resimler/onay.jpg">
	<h3>Kaydınız Onaylandı</h3>
	<p><b>Giriş Yapabilirsiniz</b></p>
<p><a href="index.php?SK=6">Giriş Yap</a></p>
</div>
<div style="height:100px;" ></div>