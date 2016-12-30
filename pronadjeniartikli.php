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

<body>
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
<div class="katalog">
<?php
include 'pretraga.php';
?>

<?php
if(isset($_POST['trazilica'])){
	$subm=$_POST['trazilica'];
	$procitaj=simplexml_load_file("proizvodi.xml") or die("Error: Cannot create object");
	
	
	foreach($procitaj->children() as $pro) {
		$duz=strlen($subm);
		$trazimala=strtolower($subm);
		$xmlmala=strtolower($pro->Naziv);
		$ident=$pro->ID;
		if($trazimala==substr($xmlmala, 0, $duz) or $trazimala==substr($ident, 0, $duz)){
			echo '
			<div class="artikal">
			<span>
			<img src="';
			echo $pro->lokacija;
			echo'" alt="slika">
			</span>
			<span>
			ID: '. $pro->ID .'<br>
			Naziv: '. $pro->Naziv .'
			</span>
			</div>
			';
		}
	}
}
?> 



</div>
</div>



</body>
</html>