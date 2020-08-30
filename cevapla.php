
<?php
if(isset($_SESSION["Kullanici"])){
	if(isset($_GET["ID"])){
		$GelenSoruID		=	Guvenlik($_GET["ID"]);
	}else{
		$GelenSoruID	=	"";
	}
	
	if($GelenSoruID!=""){	
	
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="ickisim" >
	<div style="margin-top: 20px; height: 500px; " class="form-group">
		<h3 style="text-align: center;" ><b>Çözümü Yükle</b></h3>
		
	<form action="index.php?SK=19&ID=<?php echo $GelenSoruID; ?>" method="post" enctype="multipart/form-data">
		<label for="aciklama"><b>Açıklama :</b></label>
		<textarea class="form-control" id="aciklama" name="aciklama" rows="4" cols="50">
  
  		</textarea>
		
		<label style="margin-top: 20px;" for="resimm"><b>Cevabın Fotoğrafı :</b></label>&nbsp;
		<input type="file" name="resimm">
		<br>
		
		
		<div class="progress" style="margin-top: 20px;"> 
		  <div class="progress-bar" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="">
			<span class="sr-only">70% Complete</span>
		  </div>
		</div>
		
		<input type="submit" class="btn btn-danger form-control" style="margin-top: 40px; width: 150px; float: right;" value="Cevapla">
		
	
	
	</form>
</div>

</div>


	
<?php
	}else{
		echo "hata";
		exit();
	}
}else{
	header("Location:index.php?SK=6");
	exit();
}
?>

