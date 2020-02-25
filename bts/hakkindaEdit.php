
<?php
include("inc/vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 

?>

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
h3{
color: grey}
</style>
    <title>Home</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <image src="1.png" width="30px" height="30px" class="navbar-brand" />
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php#">Home <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="urunler.php#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ÜRÜNLER
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="urun1.php#">Ürün 1</a>
          <a class="dropdown-item" href="urun2.php#">Ürün 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="urun3.php#">Ürün 3</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hakkinda.php#">Hakkımızda</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="misyon.php#">Misyon&Vizyon</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="iletisim.php#">İletişim</a>
      </li>
	  
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
	 </form>
	 <a href= "signin.php#"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Giriş/Kaydol</button></a>
	 <a href= "logout.php#"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Çıkış</button></a>
  </div>
</nav> 
   <form action="" method="post">
    <main role="main" class="container">
      <h3 class="mt-5 text-center">Hakkımızda</h3>
      <center><textarea  name="aciklama" rows="20" cols="50" class="ckeditor"></textarea></center>
	  <center><td><input class="btn btn-outline-success my-2 my-sm-0"  type="submit" value="Güncelle"></td></center>
     </form>
    </main>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
   
</html>

<?php

if($_POST){
$aciklama = $_POST['aciklama'];


if ($baglanti->query("UPDATE sayfalar SET  sayfaIcerik = '$aciklama' WHERE sayfaAdi='hakkinda' ")) // Veri ekleme sorgumuzu yazıyoruz.
		{
			echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
		}
		else
		{
			echo "Hata oluştu";
		}

header("location:hakkindaEdit.php");}

else 
{ echo " "; }
?>
