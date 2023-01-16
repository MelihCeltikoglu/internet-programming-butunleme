<?php

	 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	 session_start();
if(!isset($_SESSION['kadi'])){
 echo "<script>location.href='giris.php'</script>";

}?>

        <tr>
            <td style="text-align-last: right;"><a href="anasayfa.php"><img src="images/logo.png"  height="120px"/></a></td>
            <td><a href="futbol.php"><img src="images/futbolbuton.png" height="120px"/></a></td>
            <td><a href="basketbol.php"><img src="images/basketbolbuton.png" height="120px"/></a></td>
            <td><a href="voleybol.php"><img src="images/voleybolbuton.png"  height="120px"/></a></td>
        </tr>




 
