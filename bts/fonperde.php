<?php

session_start(); //oturum başlattık
include("inc/vt.php"); //veri tabanına bağlandık 
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
$kullanici = $_SESSION['kadi'];	}
	
	
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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
  
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="carousel.css" rel="stylesheet">
    <title>Home</title>
	<style>
	.kullanicim{
		color:grey;
	}
	</style>
	
  </head>
  <body>
  <header>
  
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
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
          <a class="dropdown-item" href="tulperde.php#">Tül Perdeler</a>
          <a class="dropdown-item" href="fonperde.php#">Fon Perdeler</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="storperde.php#">Storlar</a>
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
	 
	  <td class="kullanicim" ><?php echo $kullanici ;?></td>
	  <td></td>
	  <td>
	  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"></td>
	  <td><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button></td>	  
	

	 <td><a href= "<?php echo $link ;?>#"><button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $buton;?></button></a></td>
	 </tr>
     </table>
  </div>
</nav> 


</header>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
        
      </div>
	  
	   <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde2.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div>
		  <div class="col-lg-4">
            <img class="rounded-circle" src="perde1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde2.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div>
		  <div class="col-lg-4">
            <img class="rounded-circle" src="perde1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde2.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="perde3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Sipariş Ver &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
		
		
		
		 
		  <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018-2019 Samet SOFU Perde, A.Ş &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

   		 </div><!-- /.container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
   </body>
</html>