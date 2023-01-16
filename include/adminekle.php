<?php include("veritabaniayari.php") ?>
<?php include("admin_nav.php") ?>
<html>
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yönetici Paneli</title>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
    <?php
    if($_POST){
        $kadi=$_POST["ad"];
        $sifre=$_POST["sifre"];
        $sifret=$_POST["sifret"];
        if($sifre==$sifret){
        $kayit= $vt->prepare("insert into admin set kadi=?,sifre=?");
        $kayit->execute(array($kadi,$sifre));
                 if($kayit){
                    echo "<font color='green' > basarı ile eklendi</font>";
                ;

                 }else{
                     echo "<font color='red' > eklenmedi</font>"; }
        }
        }
    ?>
	<center>
        <form class="form-group" action=" " method="post">
        <table cellpadding="5" cellspacing="5" >
            <tr>
                <td>Kullanıcı Adı</td>
                <td>
                    <input class="form-control" type="text" name="ad" />
                </td>
            </tr>
             <tr>
                <td>
                    Şifre
                </td>
                <td>
                    <input class="form-control" type="text" name="sifre" />
                </td>
            </tr>
            <tr>
                <td>
                    Şifre Tekrar
                </td>
                <td>
                    <input class="form-control" type="text" name="sifret" />
                </td>
            </tr>
                <td></td>
                <td>
                    <input class="form-control btn btn-primary" type="submit" value="Gönder"  />
                </td>
            </tr>
        </table>
        </form>
    </center>
    </div>
    </body>
</html>