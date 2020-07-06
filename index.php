<?php include 'header.php' ?>

<div class="row mb-3 mx-4">
<?php 
				$sayi=0;
				$siparissor=$db->prepare("SELECT * FROM siparis");
				$siparissor->execute();
				$sayi=$siparissor->rowcount();
?>		



	<div class="col-md-2.5  mx-5">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Toplam<b> Sipariş</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
	<?php 
				$sayi=0;
				$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_durum='Bitti'");
				$siparissor->execute();
				$sayi=$siparissor->rowcount();
?>	
	
	
	<div class="col-md-2.5 mx-5">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Biten<b> Sipariş</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
		<?php 
				$sayi=0;
				$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet='Acil'");
				$siparissor->execute();
				$sayi=$siparissor->rowcount();
?>	
	
	
	<div class="col-md-2.5 mx-5">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acil<b> Olan Sipariş</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
			<?php 
				$sayi=0;
				$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet='Acelesi Yok'");
				$siparissor->execute();
				$sayi=$siparissor->rowcount();
?>	
	
	<div class="col-md-2.5 mx-5">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Önemsiz <b>Sipariş</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>

</div>



<div class="row justify-content-center">
	<div class="col-md-11">
			<div class="card">
					<div class="card-header">
					<h5 class="card-title">Siparişler Listesi</h5></div>
		<div class="card-body">
		<div class="table-responsive">
      <table class="table table-bordered" id="siparisler" width="100%" cellspacing="0">
        <thead>
          <tr> 
            <th>No</th>
            <th>Başlık</th>
            <th>Bitiş Tarihi</th>
            <th>Aciliyet</th>
            <th>Durum</th>
            <th>İşlem</th>
          </tr>
        </thead>
        <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
        <tbody>
			<?php 
				$sayi=0;
				$siparissor=$db->prepare("SELECT * FROM siparis");
				$siparissor->execute();
						
				while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {
							$sayi++; ?>					
							
						<tr>
							<td><?php echo $sayi ?></td>
							<td><?php echo $sipariscek['sip_baslik']?></td>
							<td><?php echo $sipariscek['sip_teslim_tarihi']	?></td>
							<td><?php echo $sipariscek['sip_aciliyet']	?></td>
							<td><?php echo $sipariscek['sip_durum']	?></td>
							<td>
							
							
						
		 <div class="d-flex justify-content-center">
              <form action="siparisduzenle.php" method="POST">
                <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
                <button type="submit" name="siparisduzenle" class="btn btn-success btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-edit"></i>
                  </span>
                </button>
              </form>
              <form class="mx-2" action="islemler/islem.php" method="POST">
                <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
                <button type="submit" name="siparissilme" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-trash"></i>
                  </span>
                </button>
              </form>
        
            <form action="siparisler.php" method="POST">
              <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
              <button type="submit" name="sip_bak" class="btn btn-primary btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-eye"></i>
                </span>
              </button>
            </form>
          </div>
        </td>
      </tr>	
					    <?php } ?>		
							

			
					
					</tbody>				
				</table>
		
		
		</div>
		
		</div>
		
		</div>


	</div>
</div>

<div class="row mb-3 mx-4 mt-4">
<?php 
				$sayi=0;
				$ilacsor=$db->prepare("SELECT * FROM ilac");
				$ilacsor->execute();
				$sayi=$ilacsor->rowcount();
?>		



	<div class="col-md-2.5  mx-5">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Toplam<b> İlaç</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
	<?php 
				$sayi=0;
				$ilacsor=$db->prepare("SELECT * FROM ilac WHERE i_durum='Devam Ediyor'");
				$ilacsor->execute();
				$sayi=$ilacsor->rowcount();
?>	
	
	
	<div class="col-md-3 mx-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Devam Eden<b> İlaç</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
		<?php 
				$sayi=0;
				$ilacsor=$db->prepare("SELECT * FROM ilac WHERE i_detay='Acil'");
				$ilacsor->execute();
				$sayi=$ilacsor->rowcount();
?>	
	
	
	<div class="col-md-2.5 mx-5">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acil<b> Olan İlaç</b> Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>
	
			<?php 
				$sayi=0;
				$ilacsor=$db->prepare("SELECT * FROM ilac WHERE i_detay='Acelesi Yok'");
				$ilacsor->execute();
				$sayi=$ilacsor->rowcount();
?>	
	
	<div class="col-md-2.5 mx-5">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><b>Acil </b> Olmayan İlaç Sayısı</div>
						<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $sayi?></div>
						</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
				</div>
			</div>
		
		</div>
	</div>

</div>



<div class="row mt-4 justify-content-center">
	<div class="col-md-11">
			<div class="card">
					<div class="card-header">
					<h5 class="card-title">İlaçlar Listesi</h5></div>
		<div class="card-body">
				<div class="table-responsive">
      <table class="table table-bordered" id="ilaclar" width="100%" cellspacing="0">
        <thead>
          <tr> 
            <th>No</th>
            <th>İlaç İsmi</th>
            <th>Geliş Tarihi</th>
			<th>Durum</th>
			<th>Detay</th>
            <th>Kategorisi</th>
			<th>Barkod</th>
            <th>İşlem</th>
          </tr>
        </thead>
        <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
        <tbody>
			<?php 
				$sayi=0;
				$ilacsor=$db->prepare("SELECT * FROM ilac");
				$ilacsor->execute();
						
				while($ilaccek=$ilacsor->fetch(PDO::FETCH_ASSOC)) {
							$sayi++; ?>					
							
						<tr>
							<td><?php echo $sayi ?></td>
							<td><?php echo $ilaccek['i_adi']?></td>
							<td><?php echo $ilaccek['i_tarih']	?></td>
							<td><?php echo $ilaccek['i_durum']	?></td>
							<td><?php echo $ilaccek['i_detay']	?></td>
							<td><?php echo $ilaccek['i_kategori']	?></td>
							<td><?php echo $ilaccek['barkod']	?></td>

							<td>
							
							
						
		 <div class="d-flex justify-content-center">
              <form action="ilacduzenle.php" method="POST">
                <input type="hidden" name="i_id" value="<?php echo $ilaccek['i_id'] ?>">
                <button type="submit" name="ilacduzenle" class="btn btn-success btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-edit"></i>
                  </span>
                </button>
              </form>
              <form class="mx-2" action="islemler/islem.php" method="POST">
                <input type="hidden" name="i_id" value="<?php echo $ilaccek['i_id'] ?>">
                <button type="submit" name="ilacsilme" class="btn btn-danger btn-sm btn-icon-split">
                  <span class="icon text-white-60">
                    <i class="fas fa-trash"></i>
                  </span>
                </button>
              </form>
        
            <form action="siparisler.php" method="POST">
              <input type="hidden" name="i_id" value="<?php echo $ilaccek['i_id'] ?>">
              <button type="submit" name="ilac_bak" class="btn btn-primary btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-eye"></i>
                </span>
              </button>
            </form>
          </div>
        </td>
      </tr>	
					    <?php } ?>		
							

			
					
					</tbody>				
				</table>
		
		
		</div>
		
		</div>
		
		</div>


	</div>
</div>








<?php include 'footer.php' ?>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
<script type="text/javascript">
var dataTables = $('#siparisler').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": false,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
  
});
</script>

<script type="text/javascript">
var dataTables = $('#ilaclar').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": false,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
  
});
</script>

