<?php include("include/veritabaniayari.php") ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HABERSPOR KAYIT OL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body style="background-color: #6c757d;">
<?php
if($_POST){
    $ad=$_POST["ad"];
    $soyad=$_POST["soyad"];
    $email=$_POST["email"];
    $kadi=$_POST["kadi"];
    $sifre=$_POST["sifre"];
    $sifret=$_POST["sifret"];
    if($sifre==$sifret){
        $kayit=$vt->prepare("insert into kullanicikayit set ad=?,soyad=?,email=?,kadi=?,sifre=?");
        $kayit->execute(array($ad,$soyad,$email,$kadi,$sifre));
        if($kayit){
            echo "<font color='green' > KAYIT BAŞARILI</font>";
            //header("refresh:10;url=anasayfa.php");
            die('10 sn sonra yönlendirileceksiniz. Beklememek için <a href="anasayfa.php">tıklayın</a>');

            ;

        }else{
            echo "<font color='red' > KAYIT BAŞARISIZ</font>"; }
    }
}
?>
<section class="m-5" style="">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><a href="anasayfa.php">HABER SPOR</a>'A KAYIT OL</p>

                                <form action="kullanicikayit.php" method="post" class="mx-1 mx-md-4">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="ad">Ad</label>
                                            <input type="text" id="ad" name="ad" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="soyad">Soyad</label>
                                            <input type="text" id="soyad" name="soyad" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="kadi">Kullanıcı Adı</label>
                                            <input type="text" id="kadi" name="kadi" class="form-control" />
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">E-Posta</label>
                                            <input type="email" id="email" name="email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="sifre">Şifre</label>
                                            <input type="password" id="sifre" name="sifre" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="sifret">Şifre Tekrar</label>
                                            <input type="password" id="sifret" name="sifret" class="form-control" />
                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Kayıt Ol</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="icons/bg-haber.jpg"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container" style="margin-top: 50px; display: none;">


	<center>
 	
	<form action="kullanicikayit.php" method="post">
	<table cellpadding="5" cellspacing="5" >
    <tr>
    	<td>Ad</td>
        <td><input type="text" name="ad" /></td>
    </tr>
	<tr>
    	<td>Soyad</td>
        <td><input type="text" name="soyad" /></td>
    </tr>
	<tr>
    	<td>E-Mail</td>
        <td><input type="text" name="email" /></td>
    </tr>
	<tr>
    	<td>Kullanıcı Adı</td>
        <td><input type="text" name="kadi" /></td>
    </tr>
     <tr>
    	<td>Şifre</td>
        <td><input type="text" name="sifre" /> </td>
    </tr>
    <tr>
    	<td>Şifre Tekrar</td>
        <td><input type="text" name="sifret" /> </td>
    </tr>
    
    	<td></td>
    	<td><input type="submit" value="Gonder"  /></td>
    </tr>
    </table>
	</form>
    
    </center>
    </div>
</body>
 
</html>
