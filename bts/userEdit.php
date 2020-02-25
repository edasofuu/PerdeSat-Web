<!--userEdit.php-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <title>Giriş</title>
    <style>
        .kutu {
            margin-top: 40px
        }
    </style>
</head>
<body>
<?php
session_start(); //oturum başlattık
include("inc/vt.php"); //veri tabanına bağlandık 

//eğer mevcut oturum yoksa sayfayı yönlendiriyoruz.
if (!isset($_SESSION["Oturum"]) || $_SESSION["Oturum"] != "6789") {
    header("location:signin.php");
}

//güncelleme yapılacak kullanıcının verilerini alıyoruz
$id = (int)$_GET["id"];
$sorgu = $baglanti->query("select * from kullanicilar where id=$id");
$sonuc = $sorgu->fetch_assoc();
?>
<!-- Formumuzu oluşturuyoruz-->
<form id="form1" method="post">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
            <h3 class="text-center">Kullanıcı düzenle</h3>
            <table class="table">
                <tr>
                    <td>
                        <!-- Kullanıcı adını value ya ekliyoruz-->
                        <input type="text" ID="txtKadi" name="txtKadi" class="form-control" placeholder="Kullanıcı adı" value='<?php echo $sonuc['kadi'] ?>'/>
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
                <tr>
                    <td>
                        <?php
                        //Post varsa yani submit yapılmışsa veri tabanından kontrolü yapıyoruz.
                        if ($_POST) {

                            //Giriş formu doldurulmuşsa kontrol ediyoruz
                            $txtKadi = $_POST["txtKadi"]; //Kullanıcı adını değişkene atadık
                            $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
                            $txtParolaTekrar = $_POST["txtParolaTekrar"]; //Parolayı değişkene atadık

                            //Verilerin düzgün girilip girilmediğini kontrol ediyoruz
                            if ($txtParola == $txtParolaTekrar && $txtParola != '' && $txtKadi != '') {
                               //şifrelemeyi yapıyoruz
                                $txtParola = md5('56' . $txtParola . '23');
                                if ($sorgu2 = $baglanti->query("UPDATE kullanicilar SET kadi='$txtKadi', parola='$txtParola' WHERE  id=$id")) {
                                    header("location:uyekabul.php"); //güncelleme başarılı ise sayfayı yönlendiriyoruz
                                } else {
                                    echo 'bir hata oldu tekrar deneyin';
                                }
                            } else {
                                //eğer kullanıcı adı ve parola boş ve paralolar uyuşmuyorsa
                                //hata mesajı verdiriyoruz
                                echo "Alanları düzgün doldurunuz";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" ID="btnGiris" value="Kaydet"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
</body>
</html>