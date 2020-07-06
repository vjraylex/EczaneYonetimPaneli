<?php 
include 'islemler/baglan.php';
ob_start();
session_start();

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

if(empty($_SESSION['kul_mail'])) {
	header("location:giris.php");
	exit;
}else {
	$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE
	kul_mail=:mail ");
$kullanicisor->execute(array(
	'mail' => $_SESSION['kul_mail']
	));
	$sonuc=$kullanicisor->rowcount();
	
	if($sonuc==0) {
		echo "Mail Veya Şifreniz Yanlıştır";
		header("location:giris.php");
	}
	

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
	<meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">
	<link rel="shortcut icon" type="image/png" href="<?php echo $ayarcek['site_logo'] ?>">

	<title><?php echo $ayarcek['site_baslik'] ?></title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style type="text/css" media="screen">
		.file-details-cell {
			display: none
		}
	</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Eczane<sup> Yönetim Paneli</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>ANASAYFA</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
	 

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>SİPARİŞLER</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Genel Siparişler:</h6>
			<a class="collapse-item" href="siparisler.php">Siparişler</a>
            <a class="collapse-item" href="siparisekle.php">Sipariş Ekle</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
	        <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>İLAÇLAR</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Genel İlaç Listesi:</h6>
            <a class="collapse-item" href="ilaclar.php">Tüm İlaçlar</a>
            <a class="collapse-item" href="ilacekle.php">ilac Ekle</a>			



          </div>
        </div>
      </li>
	        <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="nobetci_eczaneler.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Nöbetçi Eczane Yönetimi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Genel Yönetim:</h6>
            <a class="collapse-item" href="nobetci_eczaneler.php">Eczaneler</a>
            <a class="collapse-item" href="neekle.php">Eczane Ekle</a>


          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      
      <!-- Nav Item - Pages Collapse Menu -->


      <!-- Nav Item - Charts -->
    

      <!-- Nav Item - Tables -->


      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           

  

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $ayarcek['site_sahibi']?></span>
                <img class="img-profile rounded-circle" src="img/1.jpg"/>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="ayarlar.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ayarlar
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="islemler/cikis.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->



      </div>
      <!-- End of Main Content -->
