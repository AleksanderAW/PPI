<?php

session_start();

require_once"connect.php";

$polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

$id=$_SESSION['id'];

$id_m=$_POST['id_m'];

$_SESSION['z_na_mecz']=$_POST['id_m'];

$adres=$_POST['adres'];

$i=$_POST['i'];

$wolne_m=$_POST['wolne_m'];

if( $wolne_m==0){
	
	 $_SESSION['e_b_m']='<br><span style="color:red">Brak wolnych miejsc</span><br><br>';
				 
				 header('Location: aktualne_g.php'); 
	
}else{


		if($polaczenie->connect_errno!=0){
			
			echo"Error: ".$polaczenie->connect_erno;
			
		}else{


	$sql4="SELECT * FROM gracze WHERE id_uzytkownika='$id' AND numer_meczu='$id_m'";

	if($rezultat=@$polaczenie->query($sql4)){
		
		$juz_zapisany = $rezultat->num_rows;

			if($juz_zapisany>0){
				
				$_SESSION['zapisany']='<br><span style="color:yellow">Już bierzesz udział!</span><br>';
						
                   $polaczenie->close();
						
				 header('Location: aktualne_g.php'); 
			
			
		}else{

			//-------------------------------------------------------------------------------------------------------------
			
			$wolne_m=$wolne_m-1;

			$sql3="UPDATE mecz SET wolne_m='$wolne_m' where id_m='$id_m'";

			if($polaczenie->query($sql3))
				
//-------------------------------------------------------------------------------------------------------------
			
			 echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
			echo "<script>console.log('Debug Objects: " . $id_m . "' );</script>";
			echo "<script>console.log('Debug Objects: " . $adres . "' );</script>";
						 
//-------------------------------------------------------------------------------------------------------------

			$sql="INSERT INTO gracze(id_uzytkownika,numer_meczu,boisko) VALUES
			('$id','$id_m','$adres')";

					if($polaczenie->query($sql)){
									 
									$_SESSION['dolaczono']='<br><span style="color:blue">Dołączono</span><br>';
                                    $_SESSION['Grasz']='<br><span style="color:blue">Jesteś zapisany!</span><br>';
									
										 header('Location: aktualne_g.php'); 
										 	 
					$polaczenie->close();

					}

			}

	      }

		}

}
?>