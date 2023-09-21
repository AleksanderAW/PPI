<?php

session_start();

if(isset($_POST['email'])){
	
	//Udana walidacja
	$wszystko_ok=true;
	
	
	//popranosc loginu
	$login=$_POST['login'];
	//dlugosc loginu
	if((strlen($login)<3)||(strlen($login)>20)){
		
		$wszystko_ok=false;
		$_SESSION['e_login']='<br><span style="color:red">Login musi posiadać od 3 do 20 znaków</span><br>';
		
		//header('Location: reg.php');
		
	}
	//znaki alfanumeryczne(bez html i css,literu i cyfry)
	if(ctype_alnum($login)==false){
		
		$wszystko_ok=false;
		$_SESSION['e_login2']='<br><span style="color:red">Login może składać się tylko z liter i cyfr(bez polskich znaków)</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	//sprawdz poprawnosc hasla
	$haslo1=$_POST['haslo1'];
	$haslo2=$_POST['haslo2'];
	if((strlen($haslo1)<8)||(strlen($haslo1)>20)){
		
		$wszystko_ok=false;
		$_SESSION['e_haslo']='<br><span style="color:red">Haslo musi posiadac od 8 do 20 znaków</span><br>';
		
		//header('Location: reg.php');
		
	}else if((strlen($haslo2)<8)||(strlen($haslo2)>20)){
		
		$wszystko_ok=false;
		$_SESSION['e_haslo']='<br><span style="color:red">Haslo musi posiadac od 8 do 20 znaków</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	if($haslo1!=$haslo2){
		
		$wszystko_ok=false;
		$_SESSION['e_haslo2']='<br><span style="color:red">Podane hasła nie są identyczne</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	//Poprawnosc imienia
	$name=$_POST['name'];
	if(ctype_alpha($name)==false){
		
		$wszystko_ok=false;
		$_SESSION['e_name']='<br><span style="color:red">Imie może składać się tylko z liter</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	//Poprawnosc nazwiska
	$s_name=$_POST['s_name'];
	if(ctype_alpha($s_name)==false){
		
		$wszystko_ok=false;
		$_SESSION['e_s_name']='<br><span style="color:red">Nazwisko może składać się tylko z liter</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	//Poprawnos adresu email
	$email=$_POST['email'];
	//sanityzaca(usuwanie polskich znakow)
	$emailB=filter_var($email,FILTER_SANITIZE_EMAIL);
	if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email)){
		
		
		$wszystko_ok=false;
		$_SESSION['e_email']='<br><span style="color:red">Podaj poprawny adres e-mail</span><br>';
		
		//header('Location: reg.php');
		
	}
	
	//poprawnosc wieku uzytkownia(minimalny wiek)
	$data_u=$_POST['data_u'];
	
	//Poprawnosc numeru telefonu
	$nr_tel=$_POST['nr_tel'];
	if(ctype_digit($nr_tel)==false){
		
		$wszystko_ok=false;
		$_SESSION['e_nr_tel']='<br><span style="color:red">Numer składa się tylko z cyfr</span><br>';
		
		//header('Location: reg.php');
		
	}
	
		require_once"connect.php";
		//ukryte informacje developreskie
		mysqli_report(MYSQLI_REPORT_STRICT);
//------------------------------------------------------------------------------------------------------------------------------------------------------		
		try{
		
		  $polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

	      if($polaczenie->connect_errno!=0){
		
		          throw new Exception(mysqli_connect_errno());
	
          }else{
		   
				   //Czy email już istnieje?
				   $rezultat=$polaczenie->query("SELECT id FROM users WHERE email='$email'");
				   
				   if(!$rezultat)throw new Exception($polaczenie->error);
				   
				   $ile_takich_maili=$rezultat->num_rows;
				   
				   if($ile_takich_maili>0){
					   
					   $wszystko_ok=false;
					   $_SESSION['e_email2']='<br><span style="color:red">Istnieje już konto z tym adresem email</span><br>';
					   
				   }
				   
					//Czy login już istnieje?
				   $rezultat=$polaczenie->query("SELECT id FROM users WHERE login='$login'");
				   
				   if(!$rezultat)throw new Exception($polaczenie->error);
				   
				   $ile_takich_loginow=$rezultat->num_rows;
				   
				   if($ile_takich_loginow>0){
					   
					   $wszystko_ok=false;
					   $_SESSION['e_login3']='<br><span style="color:red">Istnieje już konto z podanym loginem</span><br>';
			   
		            }
		   
		 if($wszystko_ok==true){
							
		//Wszytko ok,dodanie uzytkownika do bazy
						
             if($polaczenie->query("INSERT INTO users (login, pass, name, s_name, email, data_u, nr_tel)VALUES('$login','$haslo1','$name','$s_name','$email','$data_u','$nr_tel')")){
				 
				$_SESSION['u_walidacja']='<span style="color:white,margin-top:10px">Utworzono konto!</span>';
								
			header('Location: log.php'); 
				 
			 }else{
				 
				 throw new Exception($polaczenie->error);
				 
			 }
						
	}
		   
		   $polaczenie->close();
		   
	   }
	   
	
	   
		
	}catch(Exception $e){
		
		echo'<br><span style="color:red">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestracje w innym terminie</span><br>';
		echo '<br />Informacja developerska: '.$e;
	}
	
	
	
	
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<title>Gierki | Rejestracja</title>
	<meta name="keywards" content="minecraft,gry,budowanie,zabawa">
	<meta name="discryption" content="nauka programowania" />
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
				<li><a href="log.php">Zaloguj się</a></li>
			</ol>
		</div>

		<div class="container2_log">
		
			<header>
				<h1> Zarejestruj się: </h1>
			</header>
			
			<!--<form action="rejestracja.php" method="post">-->
			<form  method="post">
			
			 <input type="text" name="login" placeholder="login"/>
			 
			 <?php
			
			if(isset($_SESSION['e_login'])){
				
			echo $_SESSION['e_login'];
			unset($_SESSION['e_login']);
			
			}
			
			if(isset($_SESSION['e_login2'])){
				
			echo $_SESSION['e_login2'];
			unset($_SESSION['e_login2']);
			
			}
			
			if(isset($_SESSION['e_login3'])){
				
			echo $_SESSION['e_login3'];
			unset($_SESSION['e_login3']);
			
			}
			
			?>
				
               <input type="password" name="haslo1" placeholder="haslo"/>
	
	
               <input type="password" name="haslo2" placeholder="Powtórz haslo"/>
			   
			    <?php
			
			if(isset($_SESSION['e_haslo'])){
				
			echo $_SESSION['e_haslo'];
			unset($_SESSION['e_haslo']);
			
			}
			
			if(isset($_SESSION['e_haslo2'])){
				
			echo $_SESSION['e_haslo2'];
			unset($_SESSION['e_haslo2']);
			
			}
			
			?>
			   
			    <input type="text" name="name" placeholder="Imie"/>
			   
		     <?php
			
			if(isset($_SESSION['e_name'])){
				
			echo $_SESSION['e_name'];
			unset($_SESSION['e_name']);
			
			}
			
			?>
			   
			    <input type="text" name="s_name" placeholder="Nazwisko"/>
			   
		     <?php
			
			if(isset($_SESSION['e_s_name'])){
				
			echo $_SESSION['e_s_name'];
			unset($_SESSION['e_s_name']);
			
			}
			
			?>
			   
			   <input type="text" name="email" placeholder="Adres E-mail"/>
				
		    <?php
			
			if(isset($_SESSION['e_email'])){
				
			echo $_SESSION['e_email'];
			unset($_SESSION['e_email']);
			
			}
			
			if(isset($_SESSION['e_email2'])){
				
			echo $_SESSION['e_email2'];
			unset($_SESSION['e_email2']);
			
			}
			
			?>
				
				
				 <input type="date" name="data_u" placeholder="Data urodzenia" id="f_data"/>
				
				
				
				<input type="text"  name="nr_tel" placeholder="Numer telefonu"/>
				
				  <?php
			
			if(isset($_SESSION['e_nr_tel'])){
				
			echo $_SESSION['e_nr_tel'];
			unset($_SESSION['e_nr_tel']);
			
			}
			
			
			?>
				
					<!--
				<label>
			<input type="checkbox" name="regulamin" placeholder="Akceptuj regulamin">
				</label>
				-->
				
				<input type="submit" value="Zarejestruj się" />
				
				
			</form>
			
	
			
		</div>






		<div class="footer">Gierki.pl &copy;2023 thank you for your visit in gierki</div>

	</div>



</body>

</html>
