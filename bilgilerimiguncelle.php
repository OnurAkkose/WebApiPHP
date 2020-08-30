<?php
if(isset($_SESSION["Kullanici"])){
?>
<table class="ickisim">
	<tr>
		<td >
			<form action="index.php?SK=12" method="post">
				<table >
					<tr height="40">
						<td style="color:#FF9900"><h3>Hesabım > Üyelik Bilgileri</h3></td>
					</tr>
					<tr height="30">
						<td valign="top" style="border-bottom: 1px dashed #CCCCCC;">Aşağıdan üyelik bilgilerini görüntüleyebilir veya güncelleyebilirsin.</td>
					</tr>
					<tr height="30">
						<td valign="bottom" align="left">E-Mail Adresi (*)</td>
					</tr>
					<tr height="30">
						<td valign="top" align="left"><input type="mail" name="EmailAdresi" class="InputAlanlari" value="<?php echo $EmailAdresi; ?>"></td>
					</tr>
					<tr height="30">
						<td valign="bottom" align="left">Şifre (*)</td>
					</tr>
					<tr height="30">
						<td valign="top" align="left"><input type="password" name="Sifre" class="InputAlanlari" value="EskiSifre"></td>
					</tr>
					<tr height="30">
						<td valign="bottom" align="left">Şifre Tekrar (*)</td>
					</tr>
					<tr height="30">
						<td valign="top" align="left"><input type="password" name="SifreTekrar" class="InputAlanlari" value="EskiSifre"></td>
					</tr>
					<tr height="30">
						<td valign="bottom" align="left">İsim Soyisim (*)</td>
					</tr>
					<tr height="30">
						<td valign="top" align="left"><input type="text" name="IsimSoyisim" class="InputAlanlari" value="<?php echo $IsimSoyisim; ?>"></td>
					</tr>
					<tr height="30">
						<td valign="bottom" align="left">Telefon Numarası (*)</td>
					</tr>
					<tr height="30">
						<td valign="top" align="left"><input type="text" name="TelefonNumarasi" maxlength="11" class="InputAlanlari" value="<?php echo $TelefonNumarasi; ?>"></td>
					</tr>
					
					<tr height="40">
						<td colspan="2" align="center"><input type="submit" value="Bilgilerimi Güncelle" class="YesilButon"></td>
					</tr>
				</table>
			</form>
		</td>
		
		
	</tr>
</table>	
<?php
}else{
	header("Location:index.php");
	exit();
}
?>