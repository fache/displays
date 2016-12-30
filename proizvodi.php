 <?php
$xml=simplexml_load_file("proizvodi.xml") or die("Error: Cannot create object");
foreach($xml->children() as $artikli) {
 echo '
<div class="artikal">
<span>
<img src="';
echo $artikli->lokacija;
echo'" alt="slika">
</span>
<span>
ID: '. $artikli->ID .'<br>
Naziv: '. $artikli->Naziv .'
</span>
</div>
	';
}
?> 