 <?php
 $servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base = $conn->query("select nazivi.id, nazivi.naziv, putanje.putanja from nazivi inner join putanje on nazivi.id=putanje.id");
		 
		foreach($base as $artikli){
			$put=$artikli['putanja'];
			$ide=$artikli['id'];
			$naziv=$artikli['naziv'];
			echo '
				<div class="artikal">
				<span>
				<img src="';
				echo $put;
				echo'" alt="slika">
				</span>
				<span>
				ID: '. $ide .'<br>
				Naziv: '. $naziv .'
				</span>
				</div>
		';}
		
		
		
		
		
		
		
		
		/*$xml=simplexml_load_file("proizvodi.xml") or die("Error: Cannot create object");
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
}*/
?> 