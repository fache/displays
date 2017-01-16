<script>


function izmjenaartikla(){
var xhttp;
xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
	if (this.readyState==4&& this.status==200){
		izmjenaartiklapom(this);
	}
};
xhttp.open("GET", "proizvodi.xml", true);
xhttp.send();
}

function izmjenaartiklapom(xml){
	var iz = document.getElementById("izmjava").value;
	
	
	
	
	var i,x,xmlDoc,y,z,pamti;
	
	xmlDoc=xml.responseXML;	
	
	x=xmlDoc.getElementsByTagName("Naziv");
	
	for (i=0; i<x.length;i++)
	{
		if (x[i].childNodes[0].nodeValue==iz){
			pamti=i;
			document.getElementById("izm1").value= iz;
		}
	}
	
	y=xmlDoc.getElementsByTagName("ID");
	iz2=y[pamti].childNodes[0].nodeValue;
	document.getElementById("izm2").value= iz2;
	
	z=xmlDoc.getElementsByTagName("lokacija");
	iz3=z[pamti].childNodes[0].nodeValue;
	document.getElementById("izm3").value= iz3;
}
		

</script>

<?php $art=simplexml_load_file("proizvodi.xml") or die("Error: Cannot create object"); ?> 

<?php 
	if(isset($_POST['dodavanje-artikla'])){
		/*$dat=new DomDocument("1.0","UTF-8");
		$dat->load('proizvodi.xml');
		
		$unesinaziv=$_POST['naziv-art'];
		$unesiid=$_POST['id-art'];
		$unesiputanju=$_POST['put-slike'];
		
		$korijenTag=$dat->getElementsByTagName("products")->item(0);
		
		$artikalTag=$dat->createElement("artikal");
		$nazivTag=$dat->createElement("Naziv", $unesinaziv);
		$idTag=$dat->createElement("ID", $unesiid);
		$slikaTag=$dat->createElement("lokacija", $unesiputanju);
		
		$artikalTag->appendChild($nazivTag);
		$artikalTag->appendChild($idTag);
		$artikalTag->appendChild($slikaTag);
		
		$korijenTag->appendChild($artikalTag);
		$dat->save('proizvodi.xml');
		
		//za csv
		$xmldoc=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");
		$upis='';
		foreach($xmldoc->artikal as $artikalxml){
			$upis=$upis . $artikalxml->Naziv . ',';
			$upis=$upis . $artikalxml->ID . ',';
			$upis=$upis . $artikalxml->lokacija . "\r\n";
		}	
		file_put_contents("podaci.csv", $upis);
		*/
		$unesinaziv=$_POST['naziv-art'];
		$unesiid=$_POST['id-art'];
		$unesiputanju=$_POST['put-slike'];
		
		$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base = $conn->query("select id, naziv from nazivi where id='$unesiid'");
		$test=true;
		foreach ($base as $jedan){
			if ($unesiid == $jedan['id']){
				$test=false;
				echo('Vec postoji proizvod sa unsenim ID-em!');
				break;
			}
		}	
		if ($test){
			$sql = "INSERT INTO nazivi (ID, Naziv) VALUES ('$unesiid', '$unesinaziv')";
			$conn->exec($sql);
			$sql = "INSERT INTO cijene (ID, cijena) VALUES ($unesiid, 0)";
			$conn->exec($sql);
			$sql = "INSERT INTO putanje (ID, putanja) VALUES ($unesiid, '$unesiputanju')";
			$conn->exec($sql);
			
			/*$upis='';
			$base2 = $conn->query("select nazivi.id, nazivi.naziv, ptanje.putanja from nazivi, putanje where nazivi.id=putanje.id");
			foreach($base2 as $jedan2){
				$upis=$upis . $jedan2['naziv'] . ',';
				$upis=$upis . $jedan2['id'] . ',';
				$upis=$upis . $jedan2['putanja'] . "\r\n";
			}	
			file_put_contents("podaci.csv", $upis);*/
		}
		
	}
	
	if(isset($_POST['izmjena-artikla'])){
		$dat=new DomDocument("1.0","UTF-8");
		$dat->load('proizvodi.xml');
		
		$opcijaIzmjene=$_POST['opcijaimena1'];
		
		$xpath=new DOMXPATH($dat);
		
		$ime=$_POST['pr-naziv-art'];
		$idvrijednost=$_POST['pr-id-art'];
		$picture=$_POST['pr-put-slike'];
		
		foreach($xpath->query("/products/artikal[Naziv='$opcijaIzmjene']") as $node){
			 $node->childNodes->item(0)->nodeValue=$ime;
			 $node->childNodes->item(1)->nodeValue=$idvrijednost;
			 $node->childNodes->item(2)->nodeValue=$picture;			
		}
		
		$dat->formatoutput=true;		
		$dat->save('proizvodi.xml');
		
		//za csv
		$xmldoc=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");;
		$upis='';
		foreach($xmldoc->artikal as $artikalxml){
			$upis=$upis . $artikalxml->Naziv . ',';
			$upis=$upis . $artikalxml->ID . ',';
			$upis=$upis . $artikalxml->lokacija . "\r\n";
		}	
		file_put_contents("podaci.csv", $upis);
	}
	
	if(isset($_POST['brisanje-artikla'])){
		/*$dat=new DomDocument("1.0","UTF-8");
		$dat->load('proizvodi.xml');
		
		$brisanjeOpcije=$_POST['opcijaimena'];
		
		$xpath=new DOMXPATH($dat);
		
		foreach($xpath->query("/products/artikal[Naziv='$brisanjeOpcije']") as $node){
			$node->parentNode->removeChild($node);			
		}
		
		$dat->formatoutput=true;		
		$dat->save('proizvodi.xml');
		
		//za csv
		$xmldoc=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");;
		$upis='';
		foreach($xmldoc->artikal as $artikalxml){
			$upis=$upis . $artikalxml->Naziv . ',';
			$upis=$upis . $artikalxml->ID . ',';
			$upis=$upis . $artikalxml->lokacija . "\r\n";
		}	
		file_put_contents("podaci.csv", $upis);*/
		$brisanjeOpcije=$_POST['opcijaimena'];
		$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base = $conn->query("select id, naziv from nazivi where nazivi.naziv='$brisanjeOpcije'");
		$prva='';
		$druga='';
		foreach($base as $ime){
			$prva=$ime['naziv'];
			$druga=$ime['id'];
		}
		
		$base = $conn->query("delete from cijene where id=$druga");
		$base = $conn->query("delete from putanje where id=$druga");
		$base = $conn->query("delete from nazivi where naziv='$brisanjeOpcije'");
		
	}
?>


<?php if(isset($_POST['dodaj'])) : ?>
	<div class="dodaj-forma-div">
		<form name="formaDodaj" action="" method="POST" >
			<label><b>Naziv artikla</b></label>
			<input type="text" placeholder="Unesi naziv" name="naziv-art" required><br>
			<label><b>ID artikla</b></label>
			<input type="text" placeholder="Unesi ID" name="id-art" required><br>
			<label><b>Putanja slike</b></label>
			<input type="text" placeholder="Unesi putanju" name="put-slike" required><br>

			<input type="submit" name="dodavanje-artikla" value="Dodaj">
		</form>
	</div>

<?php elseif(isset($_POST['izmjeni'])) : ?>
	<form action="" method="POST">
		<label><b>Izaberi artikal</b></label><br>
		<select name="opcijaimena1" onchange="izmjenaartikla()"  id="izmjava" required>
			<?php
		$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base = $conn->query("select naziv from nazivi");
		foreach($base as $naz) {?>
					
			<option><?php echo $naz['naziv'] ?></option>
		<?php } ?>
		</select><br>
		
		<label><b>Promijeni naziv artikla</b></label>
		<input type="text" placeholder="Unesi naziv" name="pr-naziv-art" id="izm1" required><br>
		<label><b>Promijeni ID artikla</b></label>
		<input type="text" placeholder="Unesi ID" name="pr-id-art" id="izm2" required><br>
		<label><b>Promijeni putanju slike</b></label>
		<input type="text" placeholder="Unesi putanju" name="pr-put-slike" id="izm3" required><br>

		<button type="submit" name="izmjena-artikla">Izmjeni artikal</button>
	</form>
	
<?php elseif(isset($_POST['obrisi'])) : ?>
	<form action="" method="POST">
		<label><b>Izaberi artikal</b></label><br>
		<select name="opcijaimena" required>
		<?php
		$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base = $conn->query("select naziv from nazivi");
		foreach($base as $naz) {?>
					
			<option><?php echo $naz['naziv'] ?></option>
		<?php } ?>
		</select><br>

		<button type="submit" name="brisanje-artikla">Obrisi artikal</button>
	</form>
	
<?php elseif(isset($_POST['xmltobase'])) : ?>
	<?php 
	$servername = "localhost";
	$username = "admin";
	$password = "pass";
	$dbname = "displays";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$prebacixml=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");
		
		foreach($prebacixml->artikal as $artikalxml){
			
			$rezultat = $conn->query("select ID from nazivi where ID=$artikalxml->ID");
			$nema=true;
			foreach($rezultat as $ok){
				$nema=false;
			}
			if (!$rezultat) {
				$greska = $conn->errorInfo();
				print "SQL greška: " . $greska[2];
				exit();
			}
			if (!$nema) {
				continue;				
			}
			
			$sql = "INSERT INTO nazivi (ID, Naziv) VALUES ($artikalxml->ID,'$artikalxml->Naziv')";
			$conn->exec($sql);
			
			$sql = "INSERT INTO putanje (ID, putanja) VALUES ($artikalxml->ID,'$artikalxml->lokacija')";
			$conn->exec($sql);
			
			$sql = "INSERT INTO cijene (ID, cijena) VALUES ($artikalxml->ID,0)";
			$conn->exec($sql);
		}
	
    }
	
	catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
		/*$servername = "localhost";
		$username = "admin";
		$password = "pass";
		$dbname = "displays";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$prebacixml=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");
		
		foreach($prebacixml->artikal as $artikalxml){
			
			$sql = "INSERT INTO nazivi (ID, Naziv) VALUES ($artikalxml->ID, $artikalxml->Naziv)";
			echo 'ok ';
			if ($conn->query($sql) == TRUE) {
				//echo "New record created successfully";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}*/


	?> 
<?php endif; ?>


