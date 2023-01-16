<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Giriş Sayfası</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/giris.css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
<div align="center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Güncel Spor Gazetesi</h2>
                <hr>
                <h6><b>Haber Yazarı:</b> Melih ÇELTİKOĞLU</h6>
            </div>
        </div>
    </div>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>ÜYE GİRİŞİ</h3>
                <p>
                    <a href="kullanicigirisi.php">
                        <img class="img-responsive" src="icons/authorized-person.png"  width="256"/>
                    </a>
                </p>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>YÖNETİCİ GİRİŞİ</h3>
                <p>
                    <a href="include/giris.php">
                        <img src="icons/unauthorized-person.png" width="256"/>
                    </a>
                </p>
            </div>
            <div class="col-md-12" style="margin-top:20px">
                <div class="alert alert-warning" role="alert">
                    Lütfen giriş yapmak için hangi kullanıcı tipindeyseniz yukarıdan onu seçiniz.
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
