<?php include "include/veritabaniayari.php"; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>HABER SPOR Basketbol</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
    <style>
        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-size: 18px;
            line-height: 1.42857143;
            color: #555555;

        }
        h1{
            text-align:center;
            margin-top:-20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
<table width="1251" height="1095" align="center" >
    <?php include "header.php"; ?>

    <tr>
        <td height="39" colspan="4"><img src="images/basketbolhaberleri-banner.png" width="1265" height="35" /></td>
    </tr>
    <tr>
        <td height="645" colspan="3" style="border-right:1px solid;">
            <?php
            $id = null;
            if (isset($_GET["id"])) {
                $id = htmlentities($_REQUEST["id"], ENT_QUOTES);
            }
            ?>

            <?php
            $veri = $vt
                ->query("select * from basketbol where id=$id")
                ->fetchAll(PDO::FETCH_ASSOC);

            foreach ($veri as $row) {
                echo "</br><h1>";
                print_r($row["haberbaslik"]);
                echo "</h1>";
                echo '<center><img src="';
                print_r($row["resimyolu"]);
                echo '" alt="" style="width:900px;height:450px;margin-top: 10px;"></center>';
            }
            ?>
        </td>
        <td align="center"><img src="images/bfoto.JPG" width="300" /></td>
    </tr>
    <tr>
        <td colspan="3" style="border-right:1px solid;">
            <blockquote>
                <?php
                $veri = $vt
                    ->query("select * from basketbol where id=$id")
                    ->fetchAll(PDO::FETCH_ASSOC);

                foreach ($veri as $row) {
                    echo "</br><p style='    text-align: justify; padding:15px;'>";
                    print_r($row["icerik"]);
                    echo "</p>";
                    echo '</br><p style="text-align: -webkit-right; padding:15px;">';
                    print_r($row["yazan"]);
                    echo "</p>";
                }
                ?>
            </blockquote>
        </td>
        <td align="center" style="padding-bottom:10px;">
            <!-- BAŞLA: TRT Spor Sitene Ekle -->
            <div style="font: normal 11px Arial; width: 298px; border: solid 1px #ccc; background: #fff; border-radius: 3px; box-shadow: 1px 1px 3px #ccc;">
                <h2 style="padding: 10px; margin: 0;border: 0; border-bottom: solid 1px #ccc;">
                    <a href="https://www.trtspor.com.tr/">
                        <img src="https://www.trtspor.com.tr/static/img/siteneEkle/logo_new_a.png" alt="TRT Spor Haberler" style="border: none 0;">
                    </a>
                </h2>
                <iframe frameborder="0" width="298" height="282" src="https://www.trtspor.com.tr/sitene-ekle/basketbol-2/?haberSay=10&renk=a&baslik=1&resimler=1&a=7"></iframe>
                <div style="text-align: center;line-height: 23px;border-top: solid 1px #ccc; color: #666; margin-top: 5px;box-shadow: 0 -1px 3px #ccc;">
                    <a style="text-decoration: none;color: #666; font: normal 11px Arial;" href="https://www.trtspor.com.tr/">Son Dakika Haberleri</a> &nbsp;|&nbsp; <a style="text-decoration: none;color: #666; font: normal 11px Arial;" href="https://www.trtspor.com.tr/haber/basketbol/">Basketbol Haberleri</a>
                </div>
            </div>
            <!-- BİTİŞ: TRT Spor Sitene Ekle -->


        </td>
    </tr>
    <tr style="border-top:1px solid;">
        <td height="89" colspan="4">

            <?php
            $veri = $vt
                ->query(
                    "select * from yorumlar where haberid=$id and habertipi='basketbol'"
                )
                ->fetchAll(PDO::FETCH_ASSOC);

            foreach ($veri as $row) {
                echo "<br/> ";
                echo "<b>Yorumu Yazan : </b>";
                echo $row["kuladi"];
                echo "<br/>";
                echo "Yorum : ".$row["yorum"];

                echo "<hr>";
            }
            ?>
            <div class="icerik">
                <center>

                    <form action="" method="post" enctype="multipart/form-data">
                        <table cellpadding="5" cellspacing="5" >
                            <tr>
                                <td>Kullanici Adı</td>
                                <td><input type="text" name="kadi" /></td>
                            </tr>
                            <tr>
                                <td>Yorum</td>
                                <td><textarea rows="5" cols="40" name="yorum"></textarea> </td>

                            </tr>

                            <tr>
                                <td align="center"><input type="submit" value="Gönder"  /></td>
                            </tr>
                        </table>
                    </form>
                </center>
            </div>
        </td>
    </tr>
    <tr>
        <?php include "footer.php"; ?>
    </tr>
</table>
</body>
</html>
<?php if ($_POST) {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $id = null;
    if (isset($_GET["id"])) {
        $id = htmlentities($_REQUEST["id"], ENT_QUOTES);
    }
    $habertipi = "basketbol";
    $yazan = $_POST["kadi"];
    $yorum = $_POST["yorum"];

    //veritabanına ekleme

    if (!empty($yazan) && !empty($yorum) && !empty($id) && !empty($id)) {
        $kayit = $vt->prepare(
            "insert into yorumlar set kuladi=?,yorum=?,haberid=?,habertipi=?"
        );
        $kayit->execute([$yazan, $yorum, $id, $habertipi]);
        header("Location:b1.php?id=$id");
    }
} else {
}

?>
