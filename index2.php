<?php 

session_start();

if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==false)){
	
	header('Location: index.php');
	exit();
}


?>


<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<title>Gierki | Srona główna</title>
	<meta name="keywards" content="minecraft,gry,budowanie,zbawa,nie mama pomyslu co dalej napisac">
	<meta name="discryption" content="nauka programowania dla nieinformatycznyvh ludzi!" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="author" content="Aleksander Wróblewski" />
	<link rel="stylesheet" href="w_style/style.css" type="text/css" />
	<link rel="stylesheet" href="w_style/style2.css" type="text/css" />
	
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/fontello.css">



</head>

<body>
	<div class="container">


		<div class="nav">
			<div class="logo">
				<span style="color: white">Gierki</span>
			</div>
			
			<ol>
				
			<li><a href="aktualne_g.php">Aktualne gierki</a></li>
			
				<li><a href="kreator_g.php">Stworz gierkę</a></li>
				
				<li><a href="Konto.php">Konto</a></li>
				
				<li><a href="wylog.php">Wyloguj się</a></li>
				
			</ol>
							
				
			
				
				
			
		</div>


		<header>
			<h1> Strona główna: </h1>
		</header>

		<div class="container2">

<?php

echo"<p><b> Witaj </b>".$_SESSION['login']." </p>";
echo"<p><b> Id użytkownika: </b>".$_SESSION['id']." </p>";
echo"<p><b>Imie: </b>".$_SESSION['name']." </p>";
echo"<p><b>Nazwisko: </b>".$_SESSION['s_name']." </p><br>";

if(isset($_SESSION['z_na_mecz'])){
	
	echo"<p><b>Jesteś zapisany na mecz o numerze id: </b>".$_SESSION['z_na_mecz']." </p>";
	
	$id_m=$_SESSION['z_na_mecz'];
	
	require_once"connect.php";

    $polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);
	
	$sql6="SELECT * FROM mecz WHERE id_m='$id_m'";
	
	if($rezultat=@$polaczenie->query($sql6)){
	
    $ile_rekordow=$rezultat->num_rows;
	
	if($ile_rekordow>0){
			
		$wiersz=$rezultat->fetch_assoc();
		
		$_SESSION['na']=$wiersz['boisko'];
		$_SESSION['ad']=$wiersz['adres'];
		$_SESSION['cz']=$wiersz['czas'];
		$_SESSION['da']=$wiersz['data_m'];
		
		$rezultat->free_result();
	}
	
	}

//echo $ile_rekordow;
echo "Nazwa boiska: ".$_SESSION['na']."<br><br>";
echo "Adres: ".$_SESSION['ad']."<br><br>";
echo "Dnia: ".$_SESSION['da']."<br><br>";
echo "W godzinach: ".$_SESSION['cz']."<br><br>";



}

?>

		</div>


<div style="clear:both;"></div>

		<div class="content">

	
		<div class="socials">
			<div class="socialsdivs">
				<div class="fb social"><i class="icon-facebook-official icon"></i></div>
				<div class="ig social"><i class="icon-instagram icon"></i></div>
				<div class="yt social"><i class="icon-youtube icon"></i></div>
				<div class="tw social"><i class="icon-twitter icon"></i></div>
				<div style="clear:both;"></div>
			</div>
		</div>

	</div>

		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>