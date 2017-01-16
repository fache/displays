<?php
session_start();
if(isset($_POST['prijava'])){
	if (isset($_SESSION['korisnik']))
		$korisnik = $_SESSION['korisnik'];
		
	else if (isset($_REQUEST['uname'])) {
		$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$ime=$_REQUEST['uname'];
		$base = $conn->query("select username, password from sifraprijave where username='$ime'");
		$test=true;
		foreach ($base as $jedan){
			if ($_REQUEST['uname'] == $jedan['username'] && md5($_REQUEST['psw']) == $jedan['password']){
				$korisnik = $_REQUEST['uname'];
				$_SESSION['korisnik'] = $korisnik;
				echo "<div>Uspjesno ste se prijavili kao admin</div>";
				$test=false;
			}
		}		
		//$xml=simplexml_load_file("sifraadmin.xml") or die("Error: Cannot create object");
		/*if ($_REQUEST['uname'] == ($xml->user) && $_REQUEST['psw'] == ($xml->pass)){
			$korisnik = $_REQUEST['uname'];
			$_SESSION['korisnik'] = $korisnik;
			echo "<div>Uspjesno ste se prijavili kao admin</div>";
			
		}*/
		if ($test)
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
