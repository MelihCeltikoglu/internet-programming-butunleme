<?php require_once("include/veritabaniayari.php")?>
<?php include("header.php")  ?>
<html>
    <head>
    </head>
    <body>
        <?php
            $gelen=@$_GET["sayfa"];
            if($gelen=="anasayfa")
            {
                include("anasayfa.php");

            }

            else if($gelen=="futbol")
            {
                include("futbol.php");
            }
        ?>
    </body>
</html>
	