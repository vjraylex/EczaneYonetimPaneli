<?php 
include 'baglan.php';

ob_start();
session_start();

if (isset($_POST['ayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayarlar SET
	site_baslik=:site_baslik,
	site_aciklama=:site_aciklama,
	site_sahibi=:site_sahibi	");
	
		$ayarkaydet->execute(array(
		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_sahibi' => $_POST['site_sahibi']
		));

	if($ayarkaydet) {
		header("location:../ayarlar.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}

if (isset($_POST['oturumac'])){
	$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE
	kul_mail=:mail 
	AND
	kul_sifre=:sifre");
$kullanicisor->execute(array(
	'mail' => $_POST['kul_mail'],
	'sifre' => $_POST['kul_sifre']
	));
	$sonuc=$kullanicisor->rowcount();
	
	if($sonuc==0) {
		echo "Mail Veya Şifreniz Yanlıştır";
		
	}else 
		header("location:../index.php");
	$_SESSION['kul_mail']=$_POST['kul_mail'];
}

if (isset($_POST['i_ekle'])) {
	$i_ekle=$db->prepare("INSERT INTO ilac SET
		i_adi=:i_adi,
		i_tarih=:i_tarih,
		i_durum=:i_durum,
		i_kategori=:i_kategori,
		barkod=:barkod,
		i_detay=:i_detay"
		
		
		);
	
	$i_ekle->execute(array(
	'i_adi' => $_POST['i_adi'],
	'i_tarih' => $_POST['i_tarih'],
	'i_durum' => $_POST['i_durum'],
	'i_kategori' => $_POST['i_kategori'],
	'barkod' => $_POST['barkod'],
	'i_detay' => $_POST['i_detay']	

));

	if($i_ekle) {
		header("location:../ilaclar.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}

if (isset($_POST['ilacduzenle'])) {
	$ilacduzenle=$db->prepare("UPDATE ilac SET
		i_adi=:i_adi,
		i_tarih=:i_tarih,
		i_durum=:i_durum,
		i_kategori=:i_kategori,
		barkod=:barkod,		
		i_detay=:i_detay WHERE i_id=:i_id");
	
	$ilacduzenle->execute(array(
	'i_adi' => $_POST['i_adi'],
	'i_tarih' => $_POST['i_tarih'],
	'i_durum' => $_POST['i_durum'],
	'i_kategori' => $_POST['i_kategori'],
	'i_detay' => $_POST['i_detay'],
	'barkod' => $_POST['barkod'],
	'i_id' => $_POST['i_id'] 
));

	if($ilacduzenle) {
		header("location:../ilaclar.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}

if (isset($_POST['ilacsilme'])) {
	$ilacsilme=$db->prepare("DELETE FROM ilac WHERE i_id=:i_id");
	$kontrol=$ilacsilme->execute(array(
		'i_id' => $_POST['i_id']
	));
	if ($kontrol) {
		header("location:../ilaclar.php");
		}else{
			echo "BAŞARÍSÍZ";
			exit;
		}
}

if (isset($_POST['siparisekle'])) {
          $siparisekle=$db->prepare("INSERT INTO siparis SET
            musteri_isim=:isim,
            musteri_mail=:mail,
            musteri_telefon=:telefon,
            sip_baslik=:baslik,
            sip_teslim_tarihi=:teslim_tarihi,
            sip_aciliyet=:aciliyet,
            sip_aciliyet=:acelesiyok,			
            sip_durum=:durum,
            sip_ucret=:ucret,
            sip_detay=:detay
            ");

          $ekleme=$siparisekle->execute(array(
            'isim' =>  $_POST['musteri_isim'],
            'mail' =>  $_POST['musteri_mail'],
            'telefon' =>  $_POST['musteri_telefon'],
            'baslik' =>  $_POST['sip_baslik'],
            'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
            'aciliyet' =>  $_POST['sip_aciliyet'],
            'durum' =>  $_POST['sip_durum'],
            'ucret' =>  $_POST['sip_ucret'],
            'detay' => $_POST['sip_detay']
          ));

	if($siparisekle) {
		header("location:../siparisler.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}
if (isset($_POST['siparissilme'])) {
	$siparissilme=$db->prepare("DELETE FROM siparis WHERE sip_id=:sip_id");
	$kontrol=$siparissilme->execute(array(
		'sip_id' => $_POST['sip_id']
	));
	if ($kontrol) {
		header("location:../siparisler.php");
		}else{
			echo "BAŞARÍSÍZ";
			exit;
}}

if (isset($_POST['siparisduzenle'])) {
	$siparisduzenle=$db->prepare("UPDATE siparis SET
		sip_baslik=:baslik,
		sip_teslim_tarihi=:teslim_tarihi,
		sip_aciliyet=:aciliyet,
		sip_durum=:durum,
		sip_detay=:detay WHERE sip_id=:sip_id ");
	
	$siparisduzenle->execute(array(
	'baslik' => $_POST['sip_baslik'],
	'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
	'aciliyet' => $_POST['sip_aciliyet'],
	'durum' => $_POST['sip_durum'],
	'detay' => $_POST['sip_detay'],
	'sip_id' => $_POST['sip_id']
));

	if($siparisduzenle) {
		header("location:../siparisler.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}


if (isset($_POST['neekle'])) {
          $neekle=$db->prepare("INSERT INTO nobetci_eczane SET
            ne_adi=:ne_adi,
            ne_adres=:ne_adres,
            ne_telefon=:ne_telefon,
            ne_gun=:ne_gun,
            ilce=:ilce,
            bolge=:bolge
			");

          $ekleme=$neekle->execute(array(
            'ne_adi' =>  $_POST['ne_adi'],
            'ne_adres' =>  $_POST['ne_adres'],
            'ne_telefon' =>  $_POST['ne_telefon'],
            'ne_gun' =>  $_POST['ne_gun'],
            'ilce' => $_POST['ilce'],
            'bolge' =>  $_POST['bolge']
           
          ));

	if($neekle) {
		header("location:../nobetci_eczaneler.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}
if (isset($_POST['neduzenle'])) {
	$neduzenle=$db->prepare("UPDATE nobetci_eczane SET 
		ne_adi=:ne_adi,
		ne_adres=:ne_adres,
		ne_telefon=:ne_telefon,
		ne_gun=:ne_gun,
		ilce=:ilce,
		bolge=:bolge WHERE ne_id=:ne_id ");
	
	$neduzenle->execute(array(
	'ne_adi' => $_POST['ne_adi'],
	'ne_adres' => $_POST['ne_adres'],
	'ne_telefon' => $_POST['ne_telefon'],
	'ne_gun' => $_POST['ne_gun'],
	'ilce' => $_POST['ilce'],
	'bolge' => $_POST['bolge'],
	'ne_id' => $_POST['ne_id']
));

	if($neduzenle) {
		header("location:../nobetci_eczaneler.php");
		}else{
			echo "BAŞARÍSÍZ";
		exit;
}
}



if (isset($_POST['ne_sil'])) {
	$ne_sil=$db->prepare("DELETE FROM nobetci_eczane WHERE ne_id=:ne_id");
	$kontrol=$ne_sil->execute(array(
		'ne_id' => $_POST['ne_id']
	));
	if ($kontrol) {
		header("location:../nobetci_eczaneler.php");
		}else{
			echo "BAŞARÍSÍZ";
			exit;
		}
}

?>