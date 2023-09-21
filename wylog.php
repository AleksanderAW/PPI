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
	<title>Gierki | Wyloguj </title>
	<meta name="keywards" content="minecraft,gry,budowanie,zbawa,nie mama pomyslu co dalej napisac">
	<meta name="discryption" content="nauka programowania dla nieinformatycznyvh ludzi!" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="author" content="Aleksander Wróblewski" />
<link rel="stylesheet" href="w_style/style.css" type="text/css" />
	<link rel="stylesheet" href="w_style/style2.css" type="text/css" />
	<link rel="stylesheet" href="w_style/style3.css" type="text/css" />
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
			
				<li><a href="index.php">Strona glówna</a></li>
		
			   <li><a href="aktualne_g.php">Aktualne gierki</a></li>
			
				<li><a href="#">Stworz gierkę</a></li>
				
				<!--<li><a href="#">Konto</a></li>-->
	
			</ol>
			
		</div>

		<div class="container2_log">
		
			<header>
				<h1> Wyloguj się: </h1>
			</header>
			
			<p>Napewno chcesz się wylogować? <a href="index2.php"><br><br>Nie -> Strona główna</a></p>
			
		            <form action="wylogowywanie.php" method="post">

						<input type="submit" value="Wyloguj" class="enjoy">

					</form>
			

		</div>

		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>
