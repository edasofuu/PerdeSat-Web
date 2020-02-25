
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Home</title>
    <style>
		 .form-kaydol {
	 margin:80px 100px 200px 100px;
 }
	</style>
  </head>
  
  <?php
session_start(); //oturum başlattık
include("inc/vt.php"); //veri tabanına bağlandık 


//Giriş formu doldurulmuşsa kontrol ediyoruz
if ($_POST) {
    $txtKadi = $_POST["txtKadi"]; //Kullanıcı adını değişkene atadık
    $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
    $txtParolaTekrar = $_POST["txtParolaTekrar"]; //Parolayı değişkene atadık
}
?>

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
  </div>
</nav> 


<form class="form-kaydol" method="post">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
            <h6 class="text-center">Yeni Kullanıcı Ekle</h6>
            <table class="table">
                <tr>
                    <td>
                        <!-- Kullanıcı adı form gönderildiğinde kaybolmasın diye value ya ekliyoruz-->
                        <input type="text" ID="txtKadi" name="txtKadi" class="form-control" placeholder="Kullanıcı adı" value='<?php echo @$txtKadi ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParola" name="txtParola" class="form-control" placeholder="Parola"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParolaTekrar" name="txtParolaTekrar" class="form-control" placeholder="Parola Tekrar"/>
                    </td>
                </tr>
             <?php
                        //Post varsa yani submit yapılmışsa veri tabanından kontrolü yapıyoruz.
                        if ($_POST) {

                            //Verilerin düzgün girilip girilmediğini kontrol ediyoruz
                            if ($txtParola == $txtParolaTekrar && $txtParola != '' && $txtKadi != '') {
                                //parolayı belilirlediğimiz şekilde şifreliyip veri tabanına yazıyoruz
                                $txtParola = md5('56' . $txtParola . '23');
                                if ($sorgu = $baglanti->query("INSERT INTO bekleyen (kadi, parola) VALUES ('$txtKadi', '$txtParola')"))
                                {
                                    header("location:index.php"); //kayıt başarılı ise sayfayı yönlendiriyoruz
                                }
                                else
                                {
                                    echo 'bir hata oldu tekrar deneyin';
                                }
                            }
                            else
                            {
                                //eğer kullanıcı adı ve parola boş ve paralolar uyuşmuyorsa
                                //hata mesajı verdiriyoruz
                                echo "Alanları düzgün doldurunuz";
                            }
                        }
                        ?>
                <tr>
                    <td class="text-center">
                        <input type="submit" class="btn btn-outline-success" ID="btnGiris" value="Kaydet"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
   
</html>