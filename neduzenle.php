<?php include'header.php' ?>
<?php

if (isset($_POST['ne_id'])) {
	$nesor=$db->prepare("SELECT * FROM nobetci_eczane WHERE ne_id=:id");
	$nesor->execute(array(
		'id' => $_POST['ne_id']
	));
	$necek=$nesor->fetch(PDO::FETCH_ASSOC);
}
?>


<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size:2rem;">Nöbetçi Eczane Düzenle</h3></div>
	<div class="card-body">
		<form action="islemler/islem.php" method="POST">
			<div class="form-row mt-2">
				<div class="col-md-6">
					<label>Eczane Adı</label>
					<input type="text" required name="ne_adi" class="form-control" value="<?php echo $necek['ne_adi'] ?>"> 	</div>
				<div class="col-md-6">
					<label>Eczane Tarihi</label>
					<input type="date" required name="ne_gun" class="form-control" value="<?php echo $necek['ne_gun'] ?>"> 
					</div>		</div>
					<div class="form-row mt-2">
					<div class="col-md-6">
					<label>Telefon Numarası</label>
					<input type="number" class="form-control" required name="ne_telefon" value="<?php echo $necek['ne_telefon'] ?>"></div>
					<div class="col-md-6">
					<label>İlçe</label>
					<input type="text" required name="ilce" class="form-control" value="<?php echo $necek['ilce'] ?>"> 
					</div>
					</div>					
				<div class="form-row">
			  <div class="col-md-6 ">
					<label>Adresi </label>
					<input type="text" required name="ne_adres" class="form-control" value="<?php echo $necek['ne_adres'] ?>"> 
					</div>
				<div class="col-md-6 ">
					<label>Bölge </label>
					<input type="text" required name="bolge" class="form-control" value="<?php echo $necek['bolge'] ?>"> 
					</div></div></div>	
    <div class="form-row d-flex justify-content-center mb-3">
       <div class="col-md-12">
        <div class="file-loading">
          <input class="form-control" id="sip_dosyaekle" name="sip_ekle" type="file">
        </div>
      </div>
    </div>
			<input type="hidden" name="ne_id" value="<?php echo $_POST['ne_id'] ?>">
				<div class="form-row mt-2">
					<div class="col-md-12">
					<label>Eczane Detayı </label>
					<textarea name="ne_detay" class="form-control" id="detay"></textarea> 
					</div>
				</div>
				</div>
				<div class="col-md-6">
				<button type="submit" name="neduzenle" class="btn btn-primary mt-2">Kaydet</button>
					</div>
			</form>		
				
	</div>			


<?php include'footer.php' ?>
  <script src="ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('ne_detay');
</script>

<script>
  $(document).ready(function () {
    $("#sip_dosyaekle").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>