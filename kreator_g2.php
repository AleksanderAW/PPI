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
	<title>Gierki | Kreator gierek</title>
	<meta name="keywards" content="Piłka nożna">
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
			
			<li><a href="index2.php">Strona glówna</a></li>
				
			<li><a href="aktualne_g.php">Aktualne gierki</a></li>
				
				<!--<li><a href="Konto.php">Konto</a></li>-->
				
				<li><a href="wylog.php">Wyloguj się</a></li>
				
			</ol>
							
		</div>


		<div class="container2_log">
		
		<header>
			<h1> Kreator: </h1>
		</header>
		
		<?php
		error_reporting(0);
		$tworca=$_POST['tworca'];
		
		$boisko=$_POST['boisko'];
		
		$adres=$_POST['adres'];
		
		echo' <form action="tworzenie_g.php" method="post">
			
			 <input type="text" value="' . $tworca. '" name="tworca" placeholder="nick organizatora"/>
			
			 <input type="date" name="data_m" placeholder="data meczu" id="f_data"/>
			 
			 <input type="text" value="' . $boisko. '" name="boisko" placeholder="Nazwa boiska"/>
			 
			 <input type="text" value="' . $adres. '" name="adres" placeholder="Adres"/>
			 
			 <input type="text" name="typ" placeholder="Typ meczu np.7 vs 7"/>
			 
			 <input type="text" name="czas" placeholder="Czas np.20.00-21.30"/>
			 
			 <input type="text" name="skladka" placeholder="Składka(zł)"/>
			 
			 <input type="text" name=" poziom" placeholder="Poziom np.średni/wysoki"/>
			 
			 <input type="text" name="wolne_m" placeholder="Wolne miejsca"/>
			 
			 
			 <input type="submit" value="Utwórz" />
			 
			
	
     	</form>'
		
		?>

        
		
		<?php
		
		if(isset($_SESSION['u_mecz'])){
				
			echo $_SESSION['u_mecz'];
			unset($_SESSION['u_mecz']);
			
			}else if(isset($_SESSION['e_mecz'])){
				
			echo $_SESSION['e_mecz'];
			unset($_SESSION['e_mecz']);
			
			}
		
		
		?>
		
		</div>

 


<div style="clear:both;"></div>

		

		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>