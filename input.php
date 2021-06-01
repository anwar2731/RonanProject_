<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Input Data</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
<header>
        <div class="jumbotron">
            <h1>Zakat Fitrah 1442 H</h1>
            <p>Masjid Nurul Muhajirin</p>
        </div>
</header>        
<form action="../Controler/proses.php?aksi=tambah" method="post">
<table class="container">
	<tr>
		<td>Nama          :</td>
		<td><input type="text" name="nama_pemberi"></td>
	</tr>
	<tr>
		<td>Bentuk indah  :</td>
		<td>
        <select name="bentuk_zakat">
             <option value="">Pilih Bentuk Zakat</option>
             <option value="Uang">Uang</option>
             <option value="Beras">Beras</option>
             <option value="Gandum">Gandum</option>
            </select>
        </td>
	</tr>
  <tr>
		<td>Jumlah Zakat  :</td>
		<td><input type="text"	name="jumlah_zakat"></td>
	</tr>			
  <tr>
		<td>Satuan        :</td>
		<td>
        <select name="satuan_zakat">
             <option value="">Pilih Satuan</option>
             <option value="Rupiah">Rupiah</option>
             <option value="Kilogram">Kilogram</option>
            </select>
        </td>
	</tr>
  <tr>
		<td>Tanggal Zakat :</td>
		<td><input type="date"	name="tanggal_zakat"></td>
	</tr>    
</table><br>
    <input type="submit" class="btn btn-success" value="Simpan">
		<a href="tampilan.php" class="btn btn-danger">Kembali</a>
</form>    
<!-- partial -->
<script  src="./script.js"></script>
</body>
</html>


