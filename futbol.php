<?php include "include/veritabaniayari.php"; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>HABER SPOR Futbol</title>
    <style>
        p.thick {
            font-weight: bold;
        }

        a {
            color: black;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-size: 18px;
            line-height: 1.42857143;
            color: #555555;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<table class="table" align="center" border="0"> <?php include "header.php"; ?><tr>
        <td height="43" colspan="4" align="center"><img src="images/futbolhaberleri-banner.png" /></td>
    </tr>
    <tr> <?php
        $veri = $vt->query("select * from futbol  order by id desc")->fetchAll(PDO::FETCH_ASSOC);
        $sayac = 0;
        foreach ($veri as $row) {
            echo "<td>";
            echo '<a href="f1.php?id=' . $row["id"] . '"><img src="';
            print_r($row["resimyolu"]);
            echo '" alt="" style="width:312px;height:250px;margin-top: 0px;">';
            echo '</br><p class="thick" style="max-width: 310px; margin-top: 20px;">';
            print_r($row["haberbaslik"]);
            echo "</p></a>";
            echo "</td>";
            $sayac++;
            if ($sayac % 4 == 0) {
                echo "</tr><tr>";
            }
        }
        ?></tr>
    <tr>
        <td height="50" colspan="4" align="center"><img src="images/futbolhaberleri-banner.png"  /></td>
    </tr> <?php include "footer.php"; ?>
</table>
</body>
</html>