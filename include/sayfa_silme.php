<?php include("veritabaniayari.php") ?>
<?php
	$secim = null;
	if ( isset($_GET['secim']))
	{
		$secim = htmlentities($_REQUEST['secim'], ENT_QUOTES);
		$_SESSION["secim"]=$secim;
	}
?>

<?php
    session_start();
    if(!isset($_SESSION['kadi']))
    {
     echo "<script>location.href='giris.php'</script>";
    }
	require 'veri.php';
	$id = 0;
	

	
	if ( isset($_GET['id'])) {
		$id = htmlentities($_REQUEST['id'], ENT_QUOTES);
	}
	
	if ( !empty($_POST)) {
		
		$id = $_POST['id'];
		
		
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="";
		if($_SESSION["secim"]==1){
			$sql = "delete from futbol WHERE id = ?";
		}else if($_SESSION["secim"]==2){
			$sql = "delete from voleybol WHERE id = ?";
		}else if($_SESSION["secim"]==3){
			$sql = "delete from basketbol WHERE id = ?";
		}
		
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: sayfa_silme.php");
		
	} 
?>

<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yönetici Paneli</title>

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

<?php include("admin_nav.php") ?>
<div class="container">
<form class="form-horizontal" action="sayfa_silme.php?id=<?php echo $id;?>" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
<?php	if(!empty($_GET['id'])==0):
		echo '';
		else:
		echo '<p class="alert alert-error">Silmek istediğinize eminmisiniz?</p>
					  <div class="form-actions">
						  <button type="submit">Evet</button>
						  <a href="sayfa_silme.php">Hayır</a>
						</div>';
		endif;
		
		

?>
					</form>    
                    
                    
    <div class="dropdown">
      <button class="dropbtn">Haber Türü</button>
      <div class="dropdown-content">
        <a href="?secim=1">Futbol</a>
        <a href="?secim=2">Voleybol</a>
        <a href="?secim=3">Basketbol</a>
      </div>
    </div>
    <div>
        <?php
        if(isset($_GET["secim"]))
        {
            echo "<br><b>Seçilen Kategori: </b>";
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
    </div>

</br>
    <hr>
<?php

	if($secim==1){
		$veri=$vt->query("select * from futbol")->fetchAll(PDO::FETCH_ASSOC);
	}else if($secim==2){
		$veri=$vt->query("select * from voleybol")->fetchAll(PDO::FETCH_ASSOC);
	}else if($secim==3){
		$veri=$vt->query("select * from basketbol")->fetchAll(PDO::FETCH_ASSOC);
	}
	if($secim<4 && $secim>0)
	foreach($veri as $row){
		echo "<b>Başlık : </b>".$row["haberbaslik"];
		echo "<br/> <br/> ";
		echo "<p style='text-align: justify;'> <b>İçerik : </b>".$row["icerik"]."</p>";
		echo "";
        echo "<p style='text-align: left;'> <b>Yazar : </b>".$row["yazan"]."</p>";
		echo "<br/>";
		echo '<td><img src="../'.$row["resimyolu"].'" width="75" height="75"/></td>';
		echo '<td>'.$row["aciklama"].'</td>';
		echo "<br/>";
		
		echo '</tr>';
		echo '</table>';
		echo '<a href="sayfa_silme.php?id='.$row["id"].'">sil</a>';
		echo "<hr>";
		
		
		}

?>
</div>
  </body>
</html>