<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<?php
include '../model/database.php';
$db = new database();
?>
<header>
        <div class="jumbotron">
            <h1>Zakat Fitrah 1442 H</h1>
            <p>Masjid Nurul Muhajirin</p>
        </div>
</header>      
<form action="../Controler/proses.php?aksi=update"  method="Post">
<?php
foreach($db->edit($_GET['id_zakat']) as $d){
?>
<table class="container">
	<tr>
		<td>Nama</td>
		<td>
			<input type="hidden" name="id_zakat" value="<?php echo $d['id_zakat'] ?>">
			<input type="text" name="nama_pemberi" value="<?php echo $d['nama_pemberi'] ?>">
		</td>
	</tr>
	<tr>
		<td>Bentuk Zakat</td>
		<td>
        <select name="bentuk_zakat">
             <option value="<?php echo $d['bentuk_zakat'] ?>"><?php echo $d['bentuk_zakat'] ?></option>
             <option value="Uang">Uang</option>
             <option value="Beras">Beras</option>
             <option value="Gandum">Gandum</option>
            </select>
        </td>
	</tr>
	<tr>
		<td>Jumlah Zakat</td>
		<td>
			<input type="text" name="jumlah_zakat" value="<?php echo $d['jumlah_zakat'] ?>">
		</td>
	</tr>
	<tr>
		<td>Satuan</td>
		<td>
        <select name="satuan_zakat">
             <option value="<?php echo $d['satuan_zakat'] ?>"><?php echo $d['satuan_zakat'] ?></option>
             <option value="Rupiah">Rupiah</option>
             <option value="Kilogram">Kilogram</option>
            </select>
        </td>
	</tr>
	<tr>
		<td>Tanggal Zakat</td>
		<td>
			<input type="date" name="tanggal_zakat" value="<?php echo $d['tanggal_zakat'] ?>">
		</td>
	</tr>		
</table><br>
		<input type="submit" class="btn btn-success" value="Simpan">
		<a href="tampilan.php" class="btn btn-danger">Kembali</a>
<?php 
} 
?>
</form>
<!-- partial -->
<script  src="./script.js"></script>
</html>

