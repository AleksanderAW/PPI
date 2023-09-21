<?php 

session_start();

if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true)){
	
	header('Location: index2.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<title>Gierki | Logowanie</title>
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
				
				<li><a href="reg.php">Załóż konto</a></li>
			
			</ol>
			
		</div>
		
       
		 
		<div class="container2_log">
		
		 <?php

            if(isset($_SESSION['u_walidacja'])){
				
			echo $_SESSION['u_walidacja'];
			echo"<br>Zaloguj sie na nowe konto";
			unset($_SESSION['u_walidacja']);
			
			}
			
			   ?>
			   
			   <header><h1> Zaloguj się: </h1></header>
			   
			<form action="logowanie.php" method="post">
			
				<input type="text" name="login"  placeholder="login"  />
				
               <input type="password" name="haslo"  placeholder="haslo"  />
				
				<input type="submit" value="Zaloguj się" class="login" />
				
			</form>
			
			<?php
			
			if(isset($_SESSION['blad'])){
				
			echo $_SESSION['blad'];
			
			}
			
		
			?>
	
           <p>Nie masz konta? <a href="reg.php">Zarejestruj się</a></p>

		</div>


			




		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>
