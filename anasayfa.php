
<?php
include "include/veritabaniayari.php";
session_start();

if (isset($_POST["kadi"]) || isset($_SESSION["kadi"])) {
    if (!isset($_SESSION["kadi"])) {
        $kadi = $_POST["kadi"];
        $sifre = $_POST["sifre"];
        $bul = $vt->prepare(
            "select * from kullanicikayit WHERE kadi =? and sifre=? "
        );
        $bul->execute(["$kadi", "$sifre"]);
        $bul->fetch();

        if ($bul->rowCount() > 0) {
            $_SESSION["durum"] = 1;
            $_SESSION["kadi"] = $kadi;
            $_SESSION["sifre"] = $sifre;
        } else {
            header("Location:kullanicigirisi.php");
        }
    }
} else {
    header("Location:kullanicigirisi.php");
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}
        p.thick{font-weight:bold;}
        a{
            color:black;
        }
        input[type=text] {
            width: 80%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
        }
        input[type=password] {
            width: 80%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
        }

        input[type=text]:focus {
            border: 3px solid #555;
        }
        input[type=password]:focus {
            border: 3px solid #555;
        }
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }
        p	{font-size: 20px;}

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
        .button1:hover{
            background-color: #4CAF50;
            color:white;
        }
    </style>
</head>
<body>

        <table class="table" align="center" border="0" >
            <?php include "header.php"; ?>
            <tr>
                <td colspan="4" align="center"><img src="images/sporhaberleri-banner.png"  /></td>
            </tr>
            <tr>
                <td colspan="4">

                    <div class="w3-container">

                    </div>

                    <div class="w3-content" style="max-width:1200px">
                        <a href="f1.php?id=11"><img class="mySlides" src="images/s11.jpg" height="500" style="width:100%"></a>
                        <a href="b1.php?id=9"><img class="mySlides" src="images/s22.jpg" style="width:100%"></a>
                        <a href="b1.php?id=10"><img class="mySlides" src="images/s33.jpg" style="width:100%"></a>
                        <a href="v1.php?id=10"><img class="mySlides" src="images/s44.jpg" style="width:100%"></a>
                        <div class="w3-row-padding w3-section">
                            <div class="w3-col s3">
                                <img class="demo w3-opacity w3-hover-opacity-off" src="images/s11.jpg" height="150" style="width:100%" onclick="currentDiv(1)">
                            </div>
                            <div class="w3-col s3">
                                <img class="demo w3-opacity w3-hover-opacity-off" src="images/s22.jpg" height="150" style="width:100%" onclick="currentDiv(2)">
                            </div>
                            <div class="w3-col s3">
                                <img class="demo w3-opacity w3-hover-opacity-off" src="images/s33.jpg" height="150" style="width:100%" onclick="currentDiv(3)">
                            </div>
                            <div class="w3-col s3">
                                <img class="demo w3-opacity w3-hover-opacity-off" src="images/s44.jpg" height="150" style="width:100%" onclick="currentDiv(4)">
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            <tr>
                <?php
                $veri = $vt->query("select * from futbol order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                $sayac = 0;
                foreach ($veri as $row) {
                    echo "<td style='text-align: center;'>";
                    echo '<a href="f1.php?id=' . $row["id"] . '"><img src="';
                    print_r($row["resimyolu"]);
                    echo '" alt="" style="width:312px;height:250px;">';
                    echo "</br><p style='max-width: 312px; margin-top: 15px;'>";
                    print_r($row["haberbaslik"]);
                    echo "</p></a>";
                    echo "</td>";
                    $sayac++;
                    if ($sayac == 2) {
                        break;
                    }
                }
                $veri = $vt->query("select * from basketbol order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($veri as $row) {
                    echo "<td style='text-align: center;'>";
                    echo '<a href="b1.php?id=' . $row["id"] . '"><img src="';
                    print_r($row["resimyolu"]);
                    echo '" alt="" style="width:312px;height:250px;">';
                    echo "</br><p style='max-width: 312px; margin-top: 15px;'>";
                    print_r($row["haberbaslik"]);
                    echo "</p></a>";
                    echo "</td>";
                    $sayac++;
                    if ($sayac % 4 == 0) {
                        echo "</tr><tr>";
                    }
                    if ($sayac == 5) {
                        break;
                    }
                }
                $veri = $vt->query("select * from voleybol order by id desc")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($veri as $row) {
                    echo "<td style='text-align: center;'>";
                    echo '<a href="v1.php?id=' . $row["id"] . '"><img src="';
                    print_r($row["resimyolu"]);
                    echo '" alt="" style="width:312px;height:250px;">';
                    echo "</br><p style='max-width: 312px; margin-top: 15px;'>";
                    print_r($row["haberbaslik"]);
                    echo "</p></a>";
                    echo "</td>";
                    $sayac++;
                    if ($sayac == 8) {
                        break;
                    }
                }
                ?>

            </tr>
            <tr>
                <td height="43" colspan="4" align="center"><img src="images/sporhaberleri-banner.png" /></td>
            </tr>
            <?php include "footer.php"; ?>
        </table>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>
</body>