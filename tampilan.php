<?php
include('config.php');
$login_button = '';

if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        if(!empty($data['indah'])){
            $_SESSION['name'] = $data['name'];
        }
    }
}
if(!isset($_SESSION['access_token'])){
    $login_button = '<a href ="' .$google_client->createAuthUrl().'"><img src="btn_google_signin_light_focus_web.png"/>
    </a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-sacale=1.0" >
  <title>Data Zakat Fitrah</title>
  <link rel="stylesheet" href="./style.css"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
  <?php
    if($login_button == ''){
        echo '<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning"">'.
        '<div class="collapse navbar-collapse" id="navbarTogglerDemo02">'.
        '<ul class="navbar-nav mr-auto mt-2 mt-md-0">'.
        '<li class="nav-item active">'.
          '<a class="navbar-brand" href="#!">Selamat Datang</a>'.        
          '<a href="#" class="navbar-brand">'.$_SESSION['name'].'</a>'.
          '<a href="input.php" class="btn btn-primary"><b>Tambah Data</b></a>&nbsp'. 
          '<a class=" btn btn-danger" href="logout.php">Logout</a>'.'</li></div>'.'</nav>'; 
    }
    else {
        echo '<div align="center">'.$login_button . '</div>';
    }
  ?><br><br><br>
<?php
include '../Model/database.php';
$db= new database();
?>
<h1>DATA ZAKAT FITRAH 1442 H</h1>
<table class="container">
	<thead>
		<tr>
      <th><h1>Nomor</h1></th>
			<th><h1>Nama</h1></th>
			<th><h1>Bentuk Zakat</h1></th>
			<th><h1>Jumlah Zakat</h1></th>
			<th><h1>Satuan</h1></th>
      <th><h1>Tanggal Zakat</h1></th>
      <th><h1>Ubah Data</h1></th>      
		</tr>
	</thead>
 <?php
 $no=1;
 foreach($db->tampil_data() as $x){
 ?>
  <tbody>
   <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $x['nama_pemberi']; ?></td>
    <td><?php echo $x['bentuk_zakat']; ?></td>
    <td><?php echo $x['jumlah_zakat']; ?></td>
    <td><?php echo $x['satuan_zakat']; ?></td>
    <td><?php echo $x['tanggal_zakat']; ?></td>    
    <td>
     <a class="btn btn-success" href="edit.php?id_zakat=<?php echo $x['id_zakat'];?>&aksi=edit" > Edit</a>
     <a class="btn btn-danger" href="../Controler/proses.php?id_zakat=<?php echo $x['id_zakat'];?>&aksi=hapus"> Hapus</a>
    </td>
   </tr>
  </tbody>
   <?php
 }
?>
</table><br>
<a>
</a>
</body>
<!-- partial -->
<script  src="./script.js"></script>
</html>

