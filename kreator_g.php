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
				
				<li><a href="Konto.php">Konto</a></li>
				
				<li><a href="wylog.php">Wyloguj się</a></li>
				
			</ol>
							
		</div>


		<div class="container3">
		
		<header>
			<h1> Wybierz boisko: </h1>
		</header>
		

		 
		 <?php
		 
require_once"connect.php";

$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);
		 
$sql4="SELECT * FROM boiska";
	
$rezultat=@$polaczenie->query($sql4);

$ile_rekordow=$rezultat->num_rows;
		 
echo '<span style="color:blue;font-size:30px;">Liczba boisk: '.$ile_rekordow.'</span><br><br>';		 





$j = 0;

$tab2 = array();

$sql5 = "SELECT * FROM boiska";

$res2 = mysqli_query($polaczenie, $sql5);

while($record = mysqli_fetch_assoc($res2)){
	
	$tab2[$j] = $record; 
	$j++;
	
}

$j=10;

$_SESSION['wiersze2'] = $tab2;
	
if($polaczenie->connect_errno!=0){
	
	echo"ERROR: ".$polaczenie->connect_errno;
	
}else{
	
function wywolanie_boiska($j){
	
	$tab2 = $_SESSION['wiersze2'];
	               //echo "Nazwa boiska:  ".$tab2[$j]['nazwa']."<br><br>";
					//echo "Adres:  ".$tab2[$j]['adres']."<br><br>";
	
	 $tworca=$_SESSION['login'];
	
	                $boisko=$tab2[$j]['nazwa'];
					
					$adres=$tab2[$j]['adres'];
					
				 echo'<form action="kreator_g2.php" method="post">
			
			 <input type="hidden" value="' . $tworca. '" name="tworca" placeholder="nick organizatora"/>
			 
			 <input type="hidden"  value="' . $boisko. '" name="boisko" placeholder="Nazwa boiska"/>
			 
			 <input type="text" value="' . $adres. '" name="adres" placeholder="Adres"/>
			 
			
			 
			 
			 <input type="submit" value="Wybierz" />
			 
			
	
     	</form>';
	
	
}	


$liczba3=1;
$j=0;
				
					while($liczba3<=$ile_rekordow){
					
						
					echo'<div class="postcard2">';
						   
					echo'<div class="photo2">';
						   
				
								
					wywolanie_boiska($j);
	
				                       
				
						echo'</div>';
			            echo'</div>';
			
			
			
	
			        $j++;
			        $liczba3++;
					
					}

}

	
		  
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