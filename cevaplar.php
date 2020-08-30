<?php
if(isset($_GET["ID"])){
$GelenID		=	Guvenlik($_GET["ID"]);
	

$CevapSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM cevaplar WHERE SoruId = ? LIMIT 1");
$CevapSorgusu->execute([$GelenID]);
$CevapSayisi			=	$CevapSorgusu->rowCount();
$CevapSorgusuKaydi	=	$CevapSorgusu->fetchAll(PDO::FETCH_ASSOC);

	
		

?>
<link type="text/css" rel="stylesheet" href="Ayarlar/still.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<br>
	<div class="ickisim">
		<h3 style="text-align: center;">Cevaplar</h3><br><br>
		<?php
		foreach($CevapSorgusuKaydi as $c){
		?>
		
		<div class="imgdiv" >
			
			<img class="imgresim" src="Resimler/cevaplar/<?php echo $c["CevapResmi"]?>">
			
		</div>
		
		<div class="aciklamasi">
		
			<p><?php echo $c["CevapMetni"];?></p>
		</div>
		<?php
			}
		?>
		<div class="clear"></div>
	</div>

<div class="clear"></div>
<div style="height: 50px;"></div>

<?php


	
	
}
?>