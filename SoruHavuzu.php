<?php
require_once("Ayarlar/ayar.php");

if(isset($_REQUEST["MenuID"])){
	$GelenMenuId		=	SayiliIcerikleriFiltrele(Guvenlik($_REQUEST["MenuID"]));
	if($GelenMenuId == 1){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Matematik" . "' ";
	}
	if($GelenMenuId == 2){
	$MenuKosulu			=	 " AND SoruTuru = '" . "Fizik" . "' ";
		
	}
	if($GelenMenuId == 3){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Kimya" . "' ";
	}
	if($GelenMenuId == 4){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Biyoloji" . "' ";
	}
	if($GelenMenuId == 5){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Edebiyat" . "' ";
	}
	if($GelenMenuId == 6){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Tarih" . "' ";
	}
	if($GelenMenuId == 7){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Coğrafya" . "' ";
	}
	if($GelenMenuId == 8){
		$MenuKosulu			=	 " AND SoruTuru = '" . "Yabancı Dil" . "' ";
	}
	$SayfalamaKosulu	=	"&MenuID=" . $GelenMenuId;
}else{
	$GelenMenuId		=	"";
	$MenuKosulu			=	"";
	$SayfalamaKosulu	=	"";
}
if(isset($_REQUEST["AramaIcerigi"])){
	$GelenAramaIcerigi	=	Guvenlik($_REQUEST["AramaIcerigi"]);
	$AramaKosulu		=	 " AND SoruAciklama LIKE '%" . $GelenAramaIcerigi . "%' ";
	$SayfalamaKosulu	.=	"&AramaIcerigi=" . $GelenAramaIcerigi;
}else{
	$AramaKosulu		=	"";
	$SayfalamaKosulu	.=	"";
}




$SayfalamaIcinSolVeSagButonSayisi		=	2;
$SayfaBasinaGosterilecekKayitSayisi		=	10;
$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->prepare("SELECT * FROM sorular WHERE id!='' $MenuKosulu $AramaKosulu  ");
$ToplamKayitSayisiSorgusu->execute();
$ToplamKayitSayisiSorgusu				=	$ToplamKayitSayisiSorgusu->rowCount();
$SayfalamayaBaslanacakKayitSayisi		=	($Sayfalama*$SayfaBasinaGosterilecekKayitSayisi)-$SayfaBasinaGosterilecekKayitSayisi;
$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisiSorgusu/$SayfaBasinaGosterilecekKayitSayisi);



?>


<link type="text/css" rel="stylesheet" href="Ayarlar/still.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">






<div class="ickisim havuz">
	
	<div class="dersler"> 
		<ul>
			<li>
				<a href="index.php?SK=1">
					<img src="Resimler/questions.png">
					<p style="font-weight: bold;  <?php if($GelenMenuId==""){ ?>color: #FF9900;<? }else{ ?>color: #646464;<?php } ?>">Tüm Sorular</p>
				
				</a>
			
			</li>
			
				<?php
					$menulerSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler");
					$menulerSorgusu->execute();
					$menuKayitsayisi = $menulerSorgusu->rowCount();
					$menuKayitlari	=	$menulerSorgusu->fetchAll(PDO::FETCH_ASSOC);
					foreach($menuKayitlari as $menu){
						
					
				
				?>
				<li>
				<a href="index.php?SK=1&MenuID=<?php echo $menu["id"];?>">
					<img src="Resimler/<?php echo $menu["menulogo"];?>">
					<p style="font-weight: bold; <?php if($GelenMenuId==$menu["id"]){ ?>color: #FF9900;<? }else{ ?>color: #646464;<?php } ?>"><?php echo $menu["MenuAdi"]; ?></p>
				
				</a>
			
				</li>
				<?php
					}
				?>
				<li	style="float: right;">
					<a href="index.php?SK=23">	
						<button class="btn btn-dark"><b>SOR</b></button>
					</a>
					
				
				</li>
		
		</ul>
		
	<div class="clear"></div>
	</div>
	<form action="index.php?SK=1" method="post">
		<?php
			if($GelenMenuId!=""){
				?>
			<input type="hidden" name="MenuID" value="<?php echo $GelenMenuId; ?>">
				<?php
				}
				?>
		<input type="text" id="AramaIcerigi" name="AramaIcerigi">
		<input type="submit" value="Ara">
	</form>
		
</div>
<br>
	
  
     	
	<?php
	
	$sorular = $VeritabaniBaglantisi->prepare("SELECT * FROM sorular WHERE id!='' $MenuKosulu $AramaKosulu ORDER by id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SayfaBasinaGosterilecekKayitSayisi");
	$sorular->execute();
	$sorusayisi = $sorular->rowCount();
	$soru		=	$sorular->fetchAll(PDO::FETCH_ASSOC);
	
	
			
			
	foreach($soru as $s){
	?>
	
	<div class="ickisim">
		
 
	
	 <div  style="margin-top: 5px;	height: 60px; background-color: #A0A0A0;" >
		  
	   <div style="height: 100%; width: 600px; float: left; ">	
		
	   <p class="konu">
		   <span class="badge badge-success konu" ><?php echo  DonusumleriGeriDondur($s["UyeIsimSoyisim"]);?></span>&nbsp;<?php echo $s["SoruAciklama"];?></p>
	    </div>
    
     	<div style="height: 100%; width: 50px; float: left; background-color: #A0A0A0;">&nbsp;</div>
	   	<div  style="height: 100%; width: 450px; float: left; background-color: #A0A0A0;">
			
			<a href="index.php?SK=20&ID=<?php echo  DonusumleriGeriDondur($s["id"]);?>"</a><button class="btn btn-primary buton" >İncele</button></a>
			<a href="index.php?SK=25&ID=<?php echo  DonusumleriGeriDondur($s["id"]);?>"</a><button class="btn btn-primary buton" >Cevaplar</button></a>
	   </div>
		 
	  
	   
 
   </div>
	<div class="clear"></div>

	 
	<br>	
</div>
	
	<?php
	   }
	   ?>


	



	
























	<tr height="50">
						<td colspan="4" align="center"><div class="SayfalamaAlaniKapsayicisi">
							<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
								Toplam <?php echo $BulunanSayfaSayisi; ?> sayfada, <?php echo $ToplamKayitSayisiSorgusu; ?> adet kayıt bulunmaktadır.
							</div>
							
							<div class="SayfalamaAlaniIciNumaraAlaniKapsayicisi">
								<?php
								if($Sayfalama>1){
									echo "<span class='SayfalamaPasif'><a href='index.php?SK=1&SYF=1'><<</a></span>";
									$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$Sayfalama-1;
									echo "<span class='SayfalamaPasif'><a href='index.php?SK=1&SYF=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "'><</a></span>";
								}
								
								for($SayfalamaIcinSayfaIndexDegeri=$Sayfalama-$SayfalamaIcinSolVeSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$Sayfalama+$SayfalamaIcinSolVeSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
									if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
										if($Sayfalama==$SayfalamaIcinSayfaIndexDegeri){
											echo "<span class='SayfalamaAktif'>" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
										}else{
											echo "<span class='SayfalamaPasif'><a href='index.php?SK=1&SYF=" . $SayfalamaIcinSayfaIndexDegeri . "'> " . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
										}
									}
								}
								
								if($Sayfalama!=$BulunanSayfaSayisi){
									$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$Sayfalama+1;
									echo "<span class='SayfalamaPasif'><a href='index.php?SK=1&SYF=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "'>></a></span>";	
									echo "<span class='SayfalamaPasif'><a href='index.php?SK=1&SYF=" . $BulunanSayfaSayisi . "'>>></a></span>";
								}
								?>
							</div>
						</div></td>
					</tr>
	
	<br>
	 	
	
	
	
	
