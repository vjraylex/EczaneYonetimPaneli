<?php include 'header.php' ?>

<div class="container">
  <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Müşteri Adı ve Soyadı</label>
        <input type="text" class="form-control" required name="musteri_isim" placeholder="Müşteri Adı ve Soyadı">
      </div>
      <div class="form-group col-md-6">
        <label>Müşteri E-Posta</label>
        <input type="email" class="form-control" required name="musteri_mail" placeholder="Müşteri E-Posta">
      </div>
      
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Müşteri Telefon Numarası</label>
        <input type="number" class="form-control" required name="musteri_telefon" placeholder="Müşteri Telefon Numarası">
      </div>
      <div class="form-group col-md-6">
        <label>Sipariş Başlığı</label>
        <input type="text" class="form-control" required name="sip_baslik" placeholder="Sipariş Başlığı">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Sipariş Durumu</label>
        <select required name="sip_durum" class="form-control">
          <option>Yeni Başladı</option>
          <option>Devam Ediyor</option>
          <option>Bitti</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Ücret (TL)</label>
        <input type="number" class="form-control" name="sip_ucret" placeholder="Siparişinizin Ücretini Girin">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Teslim Tarihi</label>
        <input type="date" class="form-control" required name="sip_teslim_tarihi" placeholder="Teslim Tarihi">
      </div>
      <div class="form-group col-md-6">
        <label>Aciliyet</label>
        <select required name="sip_aciliyet" class="form-control">
          <option>Acil</option>
          <option>Normal</option>
          <option>Acelesi Yok</option>
        </select>
      </div> 
    </div>
    <div class="form-row d-flex justify-content-center mb-3">
       <div class="col-md-12">
        <div class="file-loading">
          <input class="form-control" id="dosya" name="sip_ekle" type="file">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <textarea class="ckeditor form-control" name="sip_detay" id="ckeditor"></textarea>
      </div>
    </div>
    <button type="submit" name="siparisekle" class="btn btn-primary">Kaydet</button>
  </form>
</div>


<?php include 'footer.php' ?>

  <script src="ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('ckeditor');
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