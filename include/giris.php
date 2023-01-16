<?php include("veritabaniayari.php") ?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/kullanicigirisi.css"/>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="kullanici-giris">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="admin.php" method="post">
                <h2 class="text-center mb-0" style="border-bottom: 1px solid;"><strong>HOŞGELDİNİZ</strong></h2>
                <h6 class="text-center">Yönetici Girişi</h6>
                <div class="form-group"><input class="form-control" type="Username" name="kadi" placeholder="Kullanıcı Adı"></div>
                <div class="form-group"><input class="form-control" type="password" name="sifre" placeholder="Şifre"></div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block btn-info" type="submit">Giriş</button></div>
            </form>
        </div>
    </div>
</div>
</body>
	



