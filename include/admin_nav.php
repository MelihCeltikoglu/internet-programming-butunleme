<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if(!isset($_SESSION["kadi"]))
{
    // Eğer giriş yapmadıysa giriş sayfasına yönlendiriliyor.
	header("Location:giris.php");

	}

$kadi = $_SESSION["kadi"];
?>
<html>
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yönetici Paneli</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Haber Uygulaması Yönetim Paneli</a>
        <button
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="yeni_haber.php">Yeni Haber Ekle</a>
                <a class="nav-link" aria-current="page" href="sayfa_silme.php">Haber silme</a>
                <a class="nav-link" aria-current="page" href="adminekle.php">Yönetici Ekleme</a>
                <a class="nav-link" aria-current="page" href="cikis.php">Çıkış Yap</a>
            </div>
        </div>
    </div>
</nav>
</body>

</html>