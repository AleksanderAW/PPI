<?php

session_start();

require_once"connect.php";

$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);



//liczenie ilosci rekordów
$sql2="SELECT * FROM mecz";

$rezultat=@$polaczenie->query($sql2);

$ile_rekordow=$rezultat->num_rows;




$i = 0;

$tab = array();

$sql = "SELECT * FROM mecz";

$res = mysqli_query($polaczenie, $sql);

while($rekord = mysqli_fetch_assoc($res)){
	
	$tab[$i] = $rekord; 
	$i++;
	
}

$_SESSION['wiersze'] = $tab;

//------------------------------------------------------------------------------------------------------------------

if($polaczenie->connect_errno!=0){
	
	echo"ERROR: ".$polaczenie->connect_errno;
	
}else{

	function wywolanie_meczu($i){
		
		
					echo'<img class="picture" src="img/VanGogha.png" />';
					echo"<br><br>";
					$tab = $_SESSION['wiersze'];
					echo "numer id meczu :  ".$tab[$i]['id_m']."<br><br>";
					echo "Twórca:  ".$tab[$i]['tworca']."<br><br>";
					echo "Data:  ".$tab[$i]['data_m']."<br><br>";
					echo "Nazwa boiska:  ".$tab[$i]['boisko']."<br><br>";
					echo "Adres:  ".$tab[$i]['adres']."<br><br>";
					echo "Format:  ".$tab[$i]['typ']."<br><br>";
					echo "Czas:  ".$tab[$i]['czas']."<br><br>";
					echo "Składka:  ".$tab[$i]['skladka']."<br><br>";
					echo "Poziom:  ".$tab[$i]['poziom']."<br><br>";
				    echo "Ilość wolnych miejsc:  ".$tab[$i]['wolne_m']."<br><br><br>";
					
	
					
					$id_m=$tab[$i]['id_m'];
					
					$adres=$tab[$i]['adres'];
					
					$wolne_m=$tab[$i]['wolne_m'];
					
						echo'
						<form action="dolacz.php" method="post">

						  
                          <input type="hidden" value="' . $id_m. '" name="id_m" />
						  
                          <input type="hidden" value="' . $adres. '" name="adres" />
						  
                          <input type="hidden" value="' . $i. '" name="i" />
						  
                         <input type="hidden" value="' . $wolne_m. '" name="wolne_m" />
						  
					
						<input type="submit" value="Zapisz się" class="enjoy">

					</form>
					';
					
								
				  
	
//--------------------------------------------------------------------------------------------------------------------------
	
             }	

	}	
	$polaczenie->close();
	






?>



<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<title>Gierki | Aktualne gry</title>
	<meta name="keywards" content="Piłka nożna">
	<meta name="discryption" content="Piłka nożna" />
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
				
				
				
				<li><a href="kreator_g.php">Stworz gierkę</a></li>
			
                <li><a href="Konto.php">Konto</a></li>
           
				 
				<li><a href="wylog.php">Wyloguj się</a>
					
				</li>
			</ol>
		</div>


		<header>
			<h1> Aktualne gierki: </h1>
		</header>

		<div class="container2">

					
					<?php
					
					if(isset($_SESSION['zapisany'])){
								
								echo $_SESSION['zapisany'];
								unset($_SESSION['zapisany']);
								
							}
							
							if(isset($_SESSION['Grasz'])){
								
								echo $_SESSION['Grasz'];
								unset($_SESSION['Grasz']);
								
							}
					
							if(isset($_SESSION['dolaczono'])){
								
								echo $_SESSION['dolaczono'];
								unset($_SESSION['dolaczono']);
							
							}else if(isset($_SESSION['e_b_m'])){
								
								echo $_SESSION['e_b_m'];
								unset($_SESSION['e_b_m']);
							
							}
					
					$liczba2=1;
					
					$i = 0;
					
					while($liczba2<=$ile_rekordow){	
						
					echo'<div class="postcard">';
						   
					echo'<div class="photo">';
						   				
					wywolanie_meczu($i);
		
						echo'</div>';
			            echo'</div>';
			
			        $i++;
			        $liczba2++;
					
					}
		
					?>
					
			

		</div>


		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>
