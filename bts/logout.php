<!--Logout.php-->
<?php
//oturumu sonlandırıyoruz
session_start();
session_destroy();

//çerezi siliyoruz
setcookie("cerez", "", time()-3600);
 
 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);   // hangi sayfadan gelindiğini tutuyor
//sayfayı yönlendiriyoruz
header("location:$url");         // çıkış yap dediğinde hangi sayfadaysan orada kalıyor ama oturumunu kapatıyor :) 

?>