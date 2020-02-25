<!--userOnay.php-->

<?php
session_start(); //oturum başlattık
include("inc/vt.php"); //veri tabanına bağlandık 

//eğer mevcut oturum yoksa sayfayı yönlendiriyoruz.
if (!isset($_SESSION["Oturum"]) || $_SESSION["Oturum"] != "6789") {
    header("location:signin.php");
}

//insert yapılacak kullanıcının verilerini alıyoruz
$id = (int)$_GET["id"];
$sorgu = $baglanti->query("select * from bekleyen where id=$id");
$sonuc = $sorgu->fetch_assoc();

$kullaniciAdi = $sonuc['kadi'];
$kullaniciSifre = $sonuc['parola'];

if ($sorgu = $baglanti->query("INSERT INTO kullanicilar (kadi, parola) VALUES ('$kullaniciAdi', '$kullaniciSifre')"))
                                {
                                   $sorgu=$baglanti->query("delete from bekleyen where id=$id");
								   header("location:uyekabul.php"); //kayıt başarılı ise sayfayı yönlendiriyoruz
                                }
                                else
                                {
                                    echo 'bir hata oldu tekrar deneyin';
                                }
								
								
?>
