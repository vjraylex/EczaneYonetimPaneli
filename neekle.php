<?php include'header.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size:2rem;">Nöbetçi Eczane Ekle</h3>

		</div>
	<div class="card-body">
		<form action="islemler/islem.php" method="POST">
			<div class="form-row mt-2">
				<div class="col-md-6">
					<label>Eczane Adı</label>
					<input type="text" name="ne_adi" class="form-control" placeholder="Eczane Adı Gİriniz"> 
					</div>
				<div class="col-md-6">
					<label>Eczane Tarihi</label>
					<input type="date" name="ne_gun" class="form-control" placeholder="Eczane Tarihini Gİriniz"> 
					</div>	
					</div>

					<div class="form-row mt-2">

					<div class="col-md-6">
					<label>Telefon Numarası</label>
					<input type="number" class="form-control" required name="ne_telefon" placeholder="Eczane Telefon Numarası">	</div>
					<div class="col-md-6">
					<label>İlçe</label>
					<input type="text" name="ilce" class="form-control" placeholder="İlçe Gİriniz"> </div>
					</div>
			
					
				<div class="form-row">
			  <div class="col-md-6 ">
					<label>Adresi </label>
					<input type="text" name="ne_adres" class="form-control" placeholder="Adres Gİriniz"> 
					</div>
				<div class="col-md-6 ">
					<label>Bölge </label>
					<input type="text" name="bolge" class="form-control" placeholder="Bölge Gİriniz"> 
					</div>		
					
					</div>	
				 </div>	
				 <div class="form-row d-flex justify-content-center mb-3">
					  <div class="col-md-12">
						<div class="file-loading">
						  <input class="form-control" id="dosya" name="dosya" type="file">
						</div>
					  </div>
					</div>

				<div class="form-row mt-2">
					<div class="col-md-12">
					<label>Eczane Detayı </label>
					<textarea name="proje_detay" class="form-control" id="detay"></textarea> 
					</div>
				</div>	</div>
				<div class="col-md-6">
				<button type="submit" name="nobetci_eczaneler.php" class="btn btn-primary mt-2">Kaydet</button>
					</div>
			</form>		
			
	</div>		






<?php include'footer.php' ?>

  <script src="ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('detay');
</script>
<script>
  $(document).ready(function () {
    $("#dosya").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
  
  </script>
