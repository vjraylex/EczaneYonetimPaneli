<?php include'header.php' ?>
<?php

if (isset($_POST['i_id'])) {
	$ilacsor=$db->prepare("SELECT * FROM ilac WHERE i_id=:id");
	$ilacsor->execute(array(
		'id' => $_POST['i_id']
	));
	$ilaccek=$ilacsor->fetch(PDO::FETCH_ASSOC);
}
?>



<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>



<div class="container">
  <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İlaç İsmi</label>
        <input type="text" class="form-control" required name="i_adi" value="<?php echo $ilaccek['i_adi'] ?>">
      </div>  
  <div class="form-group col-md-6">
        <label>Seri Numarası</label>
        <input type="number" class="form-control" required name="barkod" value="<?php echo $ilaccek['barkod'] ?>">
      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İlaç Durumu</label>
        <select required name="i_durum" class="form-control">
          <option <?php if($ilaccek['i_durum']=="Yeni Başladı"){echo "selected";} ?>>Yeni Başladı</option>
          <option <?php if($ilaccek['i_durum']=="Devam Ediyor"){echo "selected";} ?>>Devam Ediyor</option>
          <option <?php if($ilaccek['i_durum']=="Bitti"){echo "selected";} ?>>Bitti</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Aciliyet</label>
        <select required name="i_detay" class="form-control">
          <option <?php if($ilaccek['i_detay']=="Acil"){echo "selected";} ?>>Acil</option>
          <option <?php if($ilaccek['i_detay']=="Normal"){echo "selected";}?>>Normal</option>
          <option <?php if($ilaccek['i_detay']=="Acelesi Yok"){echo "selected";}?>>Acelesi Yok</option>
        </select>
      </div> 
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Geliş Tarihi</label>
        <input type="date" class="form-control" required name="i_tarih" value="<?php echo $ilaccek['i_tarih'] ?>">
      </div>
          </div>
			<input type="hidden" name="i_id" value="<?php echo $_POST['i_id'] ?>">
    <div class="form-row d-flex justify-content-center mb-3">
      <div class="col-md-12">
        <div class="file-loading">
          <input class="form-control" id="ilac_dosya_ekle" name="ilac_dosya_ekle" type="file">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
       <div class="col-md-12">
					<label>İlaç Detayı </label>
					<textarea name="i_detay" class="form-control" id="detay"><?php echo $ilaccek['i_detay'] ?></textarea> 
					</div>		
      </div>
    </div>
    <button type="submit" name="ilacduzenle" class="btn btn-primary">Kaydet</button>
  </form>
</div>


<?php include'footer.php' ?>
  <script src="ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('detay');
</script>
<script>
  $(document).ready(function () {
    $("#ilac_dosya_ekle").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>