<?php
session_start();
if (isset($_SESSION['korisnik'])){
	header("Content-disposition: attachment; filename=podaci.csv");
	header("Content-type: application/csv");
	readfile("podaci.csv");
	header("katalog.php");
}
?>