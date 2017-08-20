<form action="cari.php" method="POST">
<table align="center" width="70%" >
	<tr>
		<td width="60%">
			<input class="w3-input w3-border" type="text" type ="text" name="cari" placeholder="Cari Barang Anda"></input>
		</td>

		<td width="30%">
			<select name="jenis" size="1" class="w3-select w3-border">
				<option selected value="barang">Barang</option>
				<option value="penjual">Penjual</option>
				<option value="toko">Toko</option>
		</td>
		<td >
			<button type="submit" class="w3-btn w3-large w3-blue">CARI</button>
			
		</td>
	</tr>
</table>
</form>