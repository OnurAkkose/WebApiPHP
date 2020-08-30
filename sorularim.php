<?php
require_once("Ayarlar/ayar.php");


$SayfalamaIcinSolVeSagButonSayisi		=	2;
$SayfaBasinaGosterilecekKayitSayisi		=	10;
$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->prepare("SELECT * FROM sorular WHERE uyeId=$KullaniciID");
$ToplamKayitSayisiSorgusu->execute();
$ToplamKayitSayisiSorgusu				=	$ToplamKayitSayisiSorgusu->rowCount();
$SayfalamayaBaslanacakKayitSayisi		=	($Sayfalama*$SayfaBasinaGosterilecekKayitSayisi)-$SayfaBasinaGosterilecekKayitSayisi;
$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisiSorgusu/$SayfaBasinaGosterilecekKayitSayisi);



?>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<table class="ickisim">
	<tr>
		<td colspan="3"><hr /></td>
	</tr>
	<tr>
		<td colspan="3"><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="203" style="border: 1px solid black; text-align: center; padding: 10px 0; font-weight: bold;"><a href="index.php?SK=3" style="text-decoration: none; color: black;">Üyelik Bilgileri</a></td>
		<td width="10">&nbsp;</td>
		<td width="203" style="border: 1px solid black; text-align: center; padding: 10px 0; font-weight: bold;"><a href="index.php?SK=26" style="text-decoration: none; color: black;">Cevaplar</a></td>
		<td width="10">&nbsp;</td>
		
		<td width="203" style="border: 1px solid black; text-align: center; padding: 10px 0; font-weight: bold;"><a href="index.php?SK=21" style="text-decoration: none; color: black;">Sorularım</a></td>
		<td width="10">&nbsp;</td>
		
	</tr>
		</table></td>
	</tr>
	<tr>
		<td colspan="3"><hr /></td>
	</tr>
	<tr>
		<td width="500" valign="top">
			<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
				<tr height="20">
					<td style="color:#FF9900"><h6>Hesabım > Üyelik Bilgileri</h6></td>
				</tr>
			</table>
		
		</td>
	</tr>
	
</table>

	<div class="clear"></div>
<?php
	
	$sorular = $VeritabaniBaglantisi->prepare("SELECT * FROM sorular WHERE uyeId=$KullaniciID ORDER by id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SayfaBasinaGosterilecekKayitSayisi");
	$sorular->execute();
	$sorusayisi = $sorular->rowCount();
	$soru		=	$sorular->fetchAll(PDO::FETCH_ASSOC);
	
	
			
			
	foreach($soru as $s){
	?>

<div class="clear"></div>
<div class="ickisim">
		
 
	
	 <div  style="margin-top: 5px;	height: 60px; background-color: #A0A0A0;" >
		  
	   <div style="height: 100%; width: 600px; float: left; ">	
		
	   <p class="konu">
		   <span class="badge badge-success konu" ><?php echo  DonusumleriGeriDondur($s["UyeIsimSoyisim"]);?></span>&nbsp;<?php echo $s["SoruAciklama"];?></p>
	    </div>
    
     	<div style="height: 100%; width: 50px; float: left; background-color: #A0A0A0;">&nbsp;</div>
	   	<div  style="height: 100%; width: 450px; float: left; background-color: #A0A0A0;">
			
			<a href="index.php?SK=20&ID=<?php echo  DonusumleriGeriDondur($s["id"]);?>"</a><button class="btn btn-primary buton" >İncele</button></a>
		 
		<a href="index.php?SK=22&ID=<?php echo  DonusumleriGeriDondur($s["id"]);?>"</a><button class="btn btn-danger buton" >Sil</button></a>
			
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
<div style="height: 200px;"></div>


