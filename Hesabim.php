<?php
if(isset($_SESSION["Kullanici"])){
?>
<!doctype html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Ayarlar/still.css">
<title>Hesabım</title>
</head>

<body>
	
	<table class="ickisim">
	<tr>
		<td colspan="3"><hr /></td>
	</tr>
	<tr>
		<td colspan="3"><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="203" style="border: 1px solid black; text-align: center; padding: 10px 0; font-weight: bold;"><a href="index.php?SK=3" style="text-decoration: none; color: black;">Üyelik Bilgileri</a></td>
		<td width="10">&nbsp;</td>
		<td width="203" style="border: 1px solid black; text-align: center; padding: 10px 0; font-weight: bold;"><a href="index.php?SK=26" style="text-decoration: none; color: black;">Cevaplarım</a></td>
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
				<tr height="40">
					<td style="color:#FF9900"><h3>Hesabım > Üyelik Bilgileri</h3></td>
				</tr>
				<tr height="30">
					<td valign="top" style="border-bottom: 1px dashed #CCCCCC;">Aşağıdan üyelik bilgilerini görüntüleyebilir veya güncelleyebilirsin.</td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>İsim Soyisim</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $IsimSoyisim; ?></td>
				</tr>
				
				<tr height="30">
					<td valign="bottom" align="left"><b>E-Mail Adresi</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $EmailAdresi; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Telefon Numarası</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $TelefonNumarasi; ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Kayıt Tarihi</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo TarihBul($KayitTarihi); ?></td>
				</tr>
				<tr height="30">
					<td valign="bottom" align="left"><b>Kayıt IP</b></td>
				</tr>
				<tr height="30">
					<td valign="top" align="left"><?php echo $KayitIpAdresi; ?></td>
				</tr>
				<tr height="30">
					<td align="center"><a href="index.php?SK=11" >Bilgilerimi Güncellemek İstiyorum</a></td>
				</tr>
			</table>
		</td>
		
		<td width="20">&nbsp;</td>
		
		<td width="545" valign="top"><table width="545" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr height="40">
				<td  style="color:#FF9900"><h3>Fotoğraf</h3></td>
			</tr>
			<tr height="30">
				<td valign="top" style="border-bottom: 1px dashed #CCCCCC;">Soru Dayanışması</td>
			</tr>
			<tr height="5">
				<td height="5" style="font-size: 5px;">&nbsp;</td>
			</tr>
			<tr>
				<td><img src="" border="0"></td>
			</tr>
		</table></td>
	</tr>
</table>	
	
	
	
	
	
	
	
	
</body>
</html>
<?php
}else{
	header("Location:index.php");
	exit();
}
?>