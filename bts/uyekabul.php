
<?php
include("inc/vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
$sorgu = $baglanti->query("SELECT * FROM sayfalar where sayfaAdi='hakkinda'  "); // sayfalar tablosundaki tüm verileri çekiyoruz.
$sonuc = $sorgu->fetch_assoc();

$icerik = $sonuc['sayfaIcerik'];
$sayfaAdi = $sonuc['sayfaAdi'];


session_start(); //oturum başlattık

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    $link = "logout.php";
	$buton = "Çıkış";
	
	$sorgu = $baglanti->query("select kadi from kullanicilar");

    //Kullanıcı adlarını döngü yardımı ile tek tek elde ediyoruz
    while ($sonuc = $sorgu->fetch_assoc()) {
        //eğer bizim belirlediğimiz yapıya uygun kullanıcı var mı diye bakıyoruz.
        
			
            //oturum oluşturma buradaki değerleri güvenlik açısından
            //farklı değerler yapabilirsiniz
            //aynı zamanda kullanıcı adınıda burada tuttum
            $_SESSION["Oturum"] = "6789";
	$_SESSION["kadi"] = $sonuc['kadi']; 
	$kullanici = $_SESSION['kadi'];}
	} 
	else
	{
	$link = "signin.php";
	$buton = "Giriş Yap";
	$kullanici="";

	}


?>


 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link href="carousel.css" rel="stylesheet">
<style>
h3{
color: grey;
text-decoration:underline;
}

	.kullanicim{
		color:grey;
	}
	
	div.sol-sutun{
		background-color:grey;
		margin:40px;
		float:left;
	}
	div.sag-sutun{
		background-color:grey;
		margin:40px;
		float:left;
	}
	

	
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
    <table>
    
      <tr>
	  <td class="kullanicim" ><?php echo $_SESSION['kadi'] ;?></td>
	  <td>
	  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"></td>
	  <td><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button></td>	  
	

	 <td><a href= "<?php echo $link ;?>#"><button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $buton;?></button></a></td>
	 </tr>
     </table>
  </div>
</nav> 

    <main role="main" class="container">
    
    <center><h1>Merhaba <?php echo $kullanici; ?></h1></center>

 <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Kullanıcılar</h2>
            <table class="table">
            <td></td>
			<tr>
                <th>Kullanıcı Adı</th>
                <th>İşlem</th>
            </tr>
            <?php
            include("inc/vt.php");
            //kullanıcılarımızı veri tabanından çekiyoruz
            $sorgu = $baglanti->query("select * from kullanicilar");

            //kullanıcıları tek tek while ile alıyoruz
            while ($sonuc = $sorgu->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $sonuc["kadi"] ?></td>
                    <td>
                        <!-- Düzenleme ve silme linklerini id değerlerini yollayarak oluşturuyoruz-->
                        <a href="userEdit.php?id=<?php echo $sonuc["id"] ?>"><img width="25px" height="25px"  src="duzenle.png"/></a>
                        <a href="userDelete.php?id=<?php echo $sonuc["id"] ?>"><img width="25px" height="25px"  src="red.png"/></a>
                    </td>
                </tr>
				
                <?php
            }
            ?>
        </table>
		
          </div>
          
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Bekleyen İstekler</h2>
           <table class="table">
            <td></td>
			<tr>
                <th>Kullanıcı Adı</th>
                <th>Onayla/Reddet</th>
            </tr>
            <?php
            include("inc/vt.php");
            //kullanıcılarımızı veri tabanından çekiyoruz
            $sorgu = $baglanti->query("select * from bekleyen");

            //kullanıcıları tek tek while ile alıyoruz
            while ($sonuc = $sorgu->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $sonuc["kadi"] ?></td>
                    <td>
                        <!-- Düzenleme ve silme linklerini id değerlerini yollayarak oluşturuyoruz-->
                        <a href="userOnay.php?id=<?php echo $sonuc["id"] ?>"><img width="25px" height="25px"  src="onay.png"/></a>
                        <a href="userReddet.php?id=<?php echo $sonuc["id"] ?>"><img width="25px" height="25px"  src="red.png"/></a>
                    </td>
                </tr>
				
                <?php
            }
            ?>
        </table>
          </div>
         
        </div>
		
    </main>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
   
</html>