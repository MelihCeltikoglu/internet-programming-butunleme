<?php include "admin_nav.php"; ?>
<?php
session_start();
if (!isset($_SESSION["kadi"])) {
    header("Location:giris.php");
}
$kadi = $_SESSION["kadi"];
$yazan = $_SESSION["yazan"];
?>

<?php @include "veritabaniayari.php"; ?>
<?php
$secim = null;
if (isset($_GET["secim"])) {
    $secim = htmlentities($_REQUEST["secim"], ENT_QUOTES);
}
?>
<!doctype html>
<html>
<head>
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<div>
    <?php if ($_POST) {
        $yazan = $_POST["yazan"];

        $baslik = $_POST["baslik"];
        $icerik = $_POST["icerik"]; //dosya ekleme
        if (isset($_FILES["dosya"])) {
            if ($_FILES["dosya"]["name"]) {
                $resimyolu = "images/" . $_FILES["dosya"]["name"];
                copy(
                    $_FILES["dosya"]["tmp_name"],
                    "../images/" . $_FILES["dosya"]["name"]
                );
            }
        } else {
            echo "Lütfen bir resim gönderin";
        } //veritabanına ekleme
        if (!empty($yazan) && !empty($baslik) && !empty($icerik)) {
            if ($secim == 1) {
                $kayit = $vt->prepare(
                    "insert into futbol set haberbaslik=?,resimyolu=?,icerik=?,yazan=?"
                );

                $kayit->execute([$baslik, $resimyolu, $icerik, $yazan]);
                header("Location:yeni_haber.php");
            } elseif ($secim == 2) {
                $kayit = $vt->prepare(
                    "insert into voleybol set haberbaslik=?,resimyolu=?,icerik=?,yazan=?"
                );
                $kayit->execute([$baslik, $resimyolu, $icerik, $yazan]);
                header("Location:yeni_haber.php");
            } elseif ($secim == 3) {
                $kayit = $vt->prepare(
                    "insert into basketbol set haberbaslik=?,resimyolu=?,icerik=?,yazan=?"
                );
                $kayit->execute([$baslik, $resimyolu, $icerik, $yazan]);

                header("Location:yeni_haber.php");
            }
        }
    } else {
    ?>
    <div class="icerik" style="background-color: ivory;">
        <center>

            <form action="" class="form-group" method="post" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="5" >
                    <tr>
                        <td ><div class="dropdown form-control">
                                <button class="dropbtn" href="#">Haber Türü</button>
                                <div class="dropdown-content">
                                    <a href="?secim=1">Futbol</a>
                                    <a href="?secim=2">Voleybol</a>
                                    <a href="?secim=3">Basketbol</a>
                                </div>
                            </div>
                        </td>

                        <td style="font-weight:bold;color:green;">
                            <?php
                            if(isset($_GET["secim"]))
                            {
                                if($_GET["secim"]==1)
                                {
                                    echo "Futbol";
                                }
                                if($_GET["secim"]==2)
                                {
                                    echo "Voleybol";
                                }
                                if($_GET["secim"]==3)
                                {
                                    echo "Basketbol";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ad Soyad</td>
                        <td><input class="form-control" type="text" name="yazan" value="<?php echo $yazan; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Başlık</td>
                        <td><input class="form-control" type="text" name="baslik" /> </td>
                    </tr>
                    <tr>
                        <td>İçerik</td>
                        <td><textarea class="form-control" rows="5" cols="40" name="icerik"></textarea> </td>

                    </tr>


                    <td><td><input class="form-control" type="file" name="dosya"/></td></td>
                    <tr align="center">
                        <td colspan="2"><input class="form-control btn btn-primary" type="submit" value="Gönder"  /></td>

                    </tr>
                </table>
            </form>

        </center>




    </div>
</div>
<?php
} ?>
</body>
</html>
