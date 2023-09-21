<?php 

session_start();

if(isset($_POST['tworca'])||isset($_POST['data_m'])){	

$tworca=$_POST['tworca'];



$data_m=$_POST['data_m'];

$boisko=$_POST['boisko'];

$adres=$_POST['adres'];

$typ=$_POST['typ'];

$czas=$_POST['czas'];

$skladka=$_POST['skladka'];

$poziom=$_POST['poziom'];

$wolne_m=$_POST['wolne_m'];

}

require_once"connect.php";

$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0){
	
	echo"Error: ".$polaczenie->connect_erno;
	
}else{


if($polaczenie->query("INSERT INTO mecz(tworca,data_m,boisko, adres, typ,czas, skladka,poziom,wolne_m) VALUES
('$tworca','$data_m','$boisko','$adres','$typ','$czas','$skladka','$poziom','$wolne_m')")){
				 
				$_SESSION['u_mecz']='<br><span style="color:blue">Utworzono Mecz</span><br>';
						
			    header('Location: kreator_g2.php'); 
				 
			 }else{
				 
				 $_SESSION['e_mecz']='<br><span style="color:red">Błąd wczytywania danych</span><br>';
				 
				 header('Location: kreator_g2.php'); 
				 
			 }


$polaczenie->close();


}



?>