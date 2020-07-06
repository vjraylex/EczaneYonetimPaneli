<?php include'header.php' ?>

<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<?php

if (isset($_POST['sip_id'])) {
	$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_id=:id");
	$siparissor->execute(array(
		'id' => $_POST['sip_id']
	));
	$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container">
  <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İsim Soyisim</label>
        <input type="text" class="form-control" required name="musteri_isim" value="<?php echo $sipariscek['musteri_isim'] ?>">
      </div>
      <div class="form-group col-md-6">
        <label>E-Posta</label>
        <input type="email" class="form-control" required name="musteri_mail" value="<?php echo $sipariscek['musteri_mail'] ?>">
      </div>
      
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Telefon Numarası</label>
        <input type="number" class="form-control" required name="musteri_telefon" value="<?php echo $sipariscek['musteri_telefon'] ?>">
      </div>
      <div class="form-group col-md-6">
        <label>Sipariş Başlığı</label>
        <input type="text" class="form-control" required name="sip_baslik" value="<?php echo $sipariscek['sip_baslik'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Sipariş Durumu</label>
        <select required name="sip_durum" class="form-control">
          <option <?php if($sipariscek['sip_durum']=="Yeni Başladı"){echo "selected";} ?>>Yeni Başladı</option>
          <option <?php if($sipariscek['sip_durum']=="Devam Ediyor"){echo "selected";} ?>>Devam Ediyor</option>
          <option <?php if($sipariscek['sip_durum']=="Bitti"){echo "selected";} ?>>Bitti</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Ücret (TL)</label>
        <input type="number" class="form-control" name="sip_ucret" value="<?php echo $sipariscek['sip_ucret'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Teslim Tarihi</label>
        <input type="date" class="form-control" required name="sip_teslim_tarihi" value="<?php echo $sipariscek['sip_teslim_tarihi'] ?>">
      </div>
      <div class="form-group col-md-6">
        <label>Aciliyet</label>
        <select required name="sip_aciliyet" class="form-control">
          <option <?php if($sipariscek['sip_aciliyet']=="Acil"){echo "selected";} ?>>Acil</option>
          <option <?php if($sipariscek['sip_aciliyet']=="Normal"){echo "selected";}?>>Normal</option>
          <option <?php if($sipariscek['sip_aciliyet']=="Acelesi Yok"){echo "selected";}?>>Acelesi Yok</option>
        </select>
      </div> 
    </div>
		<input type="hidden" name="sip_id" value="<?php echo $_POST['sip_id'] ?>">
    <div class="form-row d-flex justify-content-center mb-3">
      <div class="col-md-12">
        <div class="file-loading">
          <input class="form-control" id="sip_dosya" name="sip_dosya" type="file">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
       <div class="col-md-12">
					<label>Proje Detayı </label>
					<textarea name="sip_detay" class="form-control" id="detay"><?php echo $sipariscek['sip_detay'] ?></textarea> 
					</div>		
      </div>
    </div>
    <button type="submit" name="siparisduzenle" class="btn btn-primary">Kaydet</button>
  </form>
</div>


<?php include'footer.php' ?>
  <script src="ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('detay');
</script>
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