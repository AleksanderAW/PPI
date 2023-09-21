<?php

session_start();

require_once"connect.php";

$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0){
	
	echo"Error: ".$polaczenie->connect_erno;
	
}else{
	
$login=$_POST['login'];
$haslo=$_POST['haslo'];	
	
$sql="SELECT * FROM users WHERE login='$login' AND pass='$haslo'";

if($rezultat=@$polaczenie->query($sql)){
	
	$ilu_userow = $rezultat->num_rows;
	
	
	if($ilu_userow>0){
		
		$_SESSION['zalogowany']=true;
		//zalogowany-zmienna flaga(stan logowania)
		
		$wiersz=$rezultat->fetch_assoc();
		
		//udział w gierce-id uzytkownika
		$_SESSION['id']=$wiersz['id'];
		//$login = $wiersz['login'];-wersja bez sesji
		
		$_SESSION['login'] = $wiersz['login'];
		$_SESSION['name'] = $wiersz['name'];
		$_SESSION['s_name'] = $wiersz['s_name'];
		
		unset($_SESSION['blad']);
		
		$rezultat->free_result();
		
		header('Location: index2.php');
	
		
	}else{
		
		$_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
		header('Location: log.php');
		
	}
	
}

$polaczenie->close();
	
}



?>