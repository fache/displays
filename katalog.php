<?php
include 'log.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Display Solutions</title>
	<link rel="stylesheet" href="stil.css">
</head>

<body onload="izmjenaartikla()">
<?php
include 'log-form.php';

?>

<div class="slider">
<img id="slider-slika" src="38.jpg" alt="slika">
</div>

<div class="meni">
<ul id="meni-lista">
  <li><a href="index.php">O nama</a></li>
  <li><a href="solucije.php">Merchandising solucije</a></li>
  <li><a href="katalog.php">Katalog</a></li>
  <li><a href="uslovi.php">Uslovi poslovanja</a></li>
  <li><a href="kontakt.php">Kontakt</a></li>
</ul>
</div>

<div class="sadrzaj">
<?php
if (isset($_SESSION['korisnik'])){
	echo'<form action="katalog.php" method="POST">
	<button type="submit" name="dodaj">Dodaj</button>
	<button type="submit" name="izmjeni">Izmjeni</button>
	<button type="submit" name="obrisi">Obrisi</button>
	</form>
	
	<a href="downloadcsv.php">Preuzmi katalog csv</a><br>
	<a href="pdfizvjestaj.php">Prikazi katalog PDF</a>
	';

	include 'admin-panel.php';
}
?>

<div class="katalog">

<h3>Katalog</h3>

<?php
include 'pretraga.php';
?>

<?php include 'proizvodi.php';?>



</div>




</div>




<script src="javascript.js"></script>
</body>
</html>