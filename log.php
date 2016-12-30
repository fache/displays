<?php
session_start();
if(isset($_POST['prijava'])){
	if (isset($_SESSION['korisnik']))
		$korisnik = $_SESSION['korisnik'];
		
	else if (isset($_REQUEST['uname'])) {
		$xml=simplexml_load_file("sifraadmin.xml") or die("Error: Cannot create object");
		if ($_REQUEST['uname'] == ($xml->user) && $_REQUEST['psw'] == ($xml->pass)){
			$korisnik = $_REQUEST['uname'];
			$_SESSION['korisnik'] = $korisnik;
			echo "<div>Uspjesno ste se prijavili kao admin</div>";
			
		}
		else
			echo "<div>Prijava nije uspjela, pokusajte ponovo.</div>";
	}

}

else if(isset($_POST['odjava'])){
	if(isset($_SESSION['korisnik'])){
		session_unset();
		session_destroy();
		echo "<div>Uspjesno ste se odjavili.</div>";		
	}
	else{
		echo "<div>Niste prijavljeni, ne mozete se odjaviti :)</div>";	
	}
}
else if(isset($_SESSION['korisnik'])){
	echo "<div>Prijavljeni ste kao admin.</div>";
}

?>
