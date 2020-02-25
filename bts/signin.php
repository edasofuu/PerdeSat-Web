
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
 .form-giris {
	 margin-top:100px;
 }
 .kullanicim{
		color:grey;
	}
	
</style>
	
    <title>Giriş</title>
  </head>
 
  
  <body class="text-center">
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
	<form class="form-inline my-2 my-lg-0" action="" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
	 </form>
	 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Giriş/Kaydol</button>

  </div>
</nav> 
<?php
session_start(); //oturum başlattık
include("inc/vt.php"); //veri tabanına bağlandık 

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    if($sonuc['kadi'] == "edas"){
	header("location:index.php");}
	else 
	{ header("location:hakkinda.php"); } 
} //eğer önceden beni hatırla işaretlenmiş ise oturum oluşturup sayfayı yönlendiriyoruz.
else if (isset($_COOKIE["cerez"])) {
    //Kullanıcı adlarını çeken sorgumuz
    $sorgu = $baglanti->query("select kadi from kullanicilar");

    //Kullanıcı adlarını döngü yardımı ile tek tek elde ediyoruz
    while ($sonuc = $sorgu->fetch_assoc()) {
        //eğer bizim belirlediğimiz yapıya uygun kullanıcı var mı diye bakıyoruz.
        if ($_COOKIE["cerez"] == md5("aa" . $sonuc['kadi'] . "bb")) {
			
            //oturum oluşturma buradaki değerleri güvenlik açısından
            //farklı değerler yapabilirsiniz
            //aynı zamanda kullanıcı adınıda burada tuttum
            $_SESSION["Oturum"] = "6789";
            $_SESSION["kadi"] = $sonuc['kadi'];
			
			if($sonuc['kadi'] == "edas" ){
            //sonrasında index sayfasına yönlendiriyorum
            header("location:index.php");}
			else 
			{header("location:hakkinda.php");}
			
			}
        
    }
}
//Giriş formu doldurulmuşsa kontrol ediyoruz
if ($_POST) {
    $txtKadi = $_POST["txtKadi"]; //Kullanıcı adını değişkene atadık
    $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
}
?>
<!-- Formumuzu oluşturuyoruz-->
<form class="form-giris" id="form1" method="post">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
            <h6 class="text-center">Lütfen Giriş Yapın</h6>
            <table class="table">
                <tr>
                    <td>
                        <!-- Kullanıcı adı form gönderildiğinde kaybolmasın diye value ya ekliyoruz-->
                        <input type="text" ID="txtKadi" name="txtKadi" class="form-control" placeholder="Kullanıcı adı"
                               value='<?php echo @$txtKadi ?>'/>

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParola" name="txtParola" class="form-control" placeholder="Parola"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox" ID="ckbHatirla" name="ckbHatirla"/>
                            Beni hatırla
                        </label>
                        <br>
                        <?php
                        //Post varsa yani submit yapılmışsa veri tabanından kontrolü yapıyoruz.
                        if ($_POST) {
                            //sorguda kullanıcı adını alıp ona karşılık parola var mı diye bakıyoruz.
                            $sorgu = $baglanti->query("select parola from kullanicilar where kadi='$txtKadi'");
                            $sonuc = $sorgu->fetch_assoc();

                            //parolaları md5 ile şifreledim ve başına sonuna kendimce eklemeler yaptım.
                            if (md5("56" . $txtParola . "23") == $sonuc["parola"]) {
                                $_SESSION["Oturum"] = "6789"; //oturum oluşturma
                                $_SESSION["kadi"] = $txtKadi;
							
                                //eğer beni hatırla seçilmiş ise cookie oluşturuyoruz.
                                //cookie de şifreleyerek kullanıcı adından oluşturdum
                                if (isset($_POST["ckbHatirla"])) {
                                    setcookie("cerez", md5("aa" . $txtKadi . "bb"), time() + (60 * 60 * 24 * 7));
                                }
                                if($txtKadi== "edas"){
								header("location:index.php");} //sayfa yönlendirme
								else { header("location:hakkinda.php"); }
                            } else {
                                //eğer kullanıcı adı ve parola doğru girilmemiş ise
                                //hata mesajı verdiriyoruz
                                echo "Kullanıcı adı veya parola yanlış!";
                            }
							
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <input type="submit" class="btn btn-outline-success" ID="btnGiris" value="Giriş"/>
                  
                        <a href="register.php" class="btn btn-outline-success">Kaydol</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
 
  </body>
 
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
</html>