<?php 
include 'header.php';

?>
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<!-- Begin Page Content -->
<div class="container">
  <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İlaç İsmi</label>
        <input type="text" class="form-control" required name="i_adi" placeholder="İlaç İsmi">
      </div> 
      <div class="form-group col-md-6">

        <label>Detay</label>
        <select required name="i_detay" class="form-control">
          <option>Acil</option>
          <option>Normal</option>
          <option>Acelesi Yok</option>
        </select>
      </div> 	
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İlaç Durumu</label>
        <select required name="i_durum" class="form-control">
          <option>Yeni Başladı</option>
          <option>Devam Ediyor</option>
          <option>Bitti</option>
        </select>
      </div>
	  	    <div class="form-group col-md-6">
        <label>Seri Numarası</label>
        <input type="number" class="form-control" required name="barkod" placeholder="ilaç Seri Numarası">
      </div>
	   </div>
 <div class="form-row">
      <div class="form-group col-md-6">
        <label>Teslim Tarihi</label>
        <input type="date" class="form-control" required name="i_tarih" placeholder="Geliş Tarihi">
      </div>
      <div class="form-group col-md-6">
        <label>İlaç Kategorisi</label>
        <select required name="i_kategori" class="form-control">
          <option>Kapsül</option>          
		  <option>Tablet</option>
          <option>Krem</option>
          <option>Merhem</option>
          <option>Şampuan</option>
          <option>Şurup</option>
          <option>Damla</option>
          <option>Sprey</option>
        </select>
      </div> 
    </div>
   
   
    <div class="form-row d-flex justify-content-center mb-3">
      <div class="col-md-12">
        <div class="file-loading">
          <input class="form-control" id="sip_dosya" name="sip_dosya" type="file">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <textarea class="ckeditor" name="detay" id="editor"></textarea>
      </div>
    </div>
    <button type="submit" name="i_ekle" class="btn btn-primary">Kaydet</button>
  </form>
</div>
<!-- End of Main Content -->
<?php include 'footer.php' ?>
<script src="ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'editor' );
</script>
<!--İşlem sonucu açılan bildirim popupunu otomatik kapatma giriş-->
<script type="text/javascript">
  $('#islemsonucu').modal('show');
  setTimeout(function() {
    $('#islemsonucu').modal('hide');
  }, 3000);
</script>
<!--İşlem sonucu açılan bildirim popupunu otomatik kapatma çıkış-->
<script>
  $(document).ready(function () {
    $("#sip_dosya").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>
