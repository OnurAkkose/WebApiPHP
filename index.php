<?php
session_start(); ob_start();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/sayfalar.php");
require_once("Ayarlar/fonksiyonlar.php");

if(isset($_REQUEST["SK"])){
	$SayfaKoduDegeri	=	SayiliIcerikleriFiltrele($_REQUEST["SK"]);
}else{
	$SayfaKoduDegeri	=	0;
}

if(isset($_REQUEST["SYF"])){
	$Sayfalama	=	SayiliIcerikleriFiltrele($_REQUEST["SYF"]);
}else{
	$Sayfalama	=	1;
}




?>


<!doctype html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="revisit-after" content="7 Days">
<link type="image/png" rel="icon" href="Resimler/altlogo.png">
<meta name="description" content="<?php echo($SiteDescription); ?>">
<meta name="keywords" content="<?php echo($SiteKeywords); ?>">
<script type="text/javascript" src="Frameworks/JQuery/jquery-3.3.1.min.js" language="javascript"></script>

<script src="Ayarlar/owl.carousel.min.js"></script>
<link type="text/css" rel="stylesheet" href="Ayarlar/still.css">
<link rel="stylesheet" href="Ayarlar/owl.carousel.min.css">
<link rel="stylesheet" href="Ayarlar/owl.theme.default.min.css">
<script type="text/javascript">
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
		items:1,
	    loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
	    nav:true,
  });
});	
</script>
<title><?php echo($SiteAdi)?></title>
</head>

<body>
	<div class="anakisim baslik">
		<div class="ickisim">
			<a href="index.php?SK=0" class="logo">
			<img src="Resimler/logoo.png">
			</a>		
		
		
		<div class="menu-sosyal-medya">
			<div class="menu">
				<ul style="list-style: none;">
					<li>
						<a href="index.php?SK=0">
							<img src="Resimler/anasayfa.png">
							<p>Anasayfa</p>
						</a>
					</li>
					<li>
						<a href="index.php?SK=1">
							<img src="Resimler/soruhavuzu.gif">
							<p>Soru Havuzu</p>
						</a>
					</li>
					
					<li>
						<?php
						if(isset($_SESSION["Kullanici"])){
						?>
						<a href="index.php?SK=3">
							<img src="Resimler/hesabim.png">
							<p>Hesabım</p>
						</a>
						<?php
						}else{
						
						?>
						<a href="index.php?SK=4">
							<img src="Resimler/kayit.png">
							<p>Üye Ol</p>
						</a>
						<?php
						}
						?>
					</li>
					<li>
						<?php
						if(isset($_SESSION["Kullanici"])){
						?>	
						    <a href="index.php?SK=10">
								<img class="img" src="Resimler/cikis.png">
								<p>Çıkış Yap</p>
							</a>
						
						
						<?php
						}else{					
						
						?>
						<a href="index.php?SK=6">
							<img class="img" src="Resimler/giris.png">
							<p>Giriş Yap</p>
						</a>
						
						<?php
						}
						?>
						
						
					</li>
				
				</ul>
			
			</div>
			
		</div>
		</div>
	
	<div class="clear"></div>
	</div>
	<tr>
		
		
		
		<?php
					
					if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="") or ($SayfaKoduDegeri==0)){
						include($Sayfa[0]);
					}else{
						include($Sayfa[$SayfaKoduDegeri]);
					}
					?>
	
	
	
	 
	
	
	
	
	<div class="anakisim altkisim">
		<div class="ickisim">
			
			<div class="birincikisim">
				
				<div class="text">
					<h4>Sınavlar için Yardımlaşma Platformu</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
				</div>
				
			</div>
			<div class="ikincikisim">
				<div class="text">
					<h4>İletişim</h4>
					<img class="resim" src="Resimler/mail.png">
					<p>sinavdayanismasi@gmail.com</p>
				</div>
			</div>
		
		</div>
	<div class="clear"></div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>
<?php
$VeritabaniBaglantisi	=	null;
ob_end_flush();
?>