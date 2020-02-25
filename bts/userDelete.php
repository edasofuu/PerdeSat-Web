<?php
session_start(); //oturum başlattık
//eğer mevcut oturum yoksa sayfayı yönlendiriyoruz.
if(!isset($_SESSION["Oturum"]) || $_SESSION["Oturum"]!="6789")
{
	header("location:signin.php");
}
if($_GET)
{
include("inc/vt.php");
$id=(int)$_GET["id"]; //silinecek id yi get ile alıyoruz

//silme sorgumuzu çalıştırıyoruz
$sorgu=$baglanti->query("delete from kullanicilar where id=$id");
//index.php sayfamıza geri dönüyoruz
header("location:uyekabul.php");
}
?>