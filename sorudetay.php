<?php
if(isset($_GET["ID"])){
$GelenID		=	Guvenlik($_GET["ID"]);
	

$UrunSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sorular WHERE id = ? LIMIT 1");
$UrunSorgusu->execute([$GelenID]);
$UrunSayisi			=	$UrunSorgusu->rowCount();
$UrunSorgusuKaydi	=	$UrunSorgusu->fetch(PDO::FETCH_ASSOC);

	if($UrunSayisi>0){
		$SoruyuSoran	=	$UrunSorgusuKaydi["UyeIsimSoyisim"];	
		
		$SoruTuru		=	$UrunSorgusuKaydi["SoruTuru"];
		$SoruAciklama	=	$UrunSorgusuKaydi["SoruAciklama"];
		$SoruResim 	=	$UrunSorgusuKaydi["SoruResim"];
		$SoruTarih 	=	$UrunSorgusuKaydi["SoruTarih"];
		

?>
<link type="text/css" rel="stylesheet" href="Ayarlar/still.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<br>
	<div class="ickisim">

	<div class="imgdiv" >
			
			<img class="imgresim" src="Resimler/sorular/<?php echo $SoruResim?>">
			
		</div>
		
		<div class="aciklamasi">
			<p><?php echo $SoruAciklama?></p>
		</div>
		
		<a  href="index.php?SK=18&ID=<?php echo  DonusumleriGeriDondur($UrunSorgusuKaydi["id"]);?>">
			<button class="btn btn-primary sorubuton">Cevapla</button></a>

</div>
		
		<div class="clear">
	</div>
			
		



		
		
		
<div style="height: 50px;"></div>		
		
		
<?php
		

	
	}else{
		header("Location:index.php");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>