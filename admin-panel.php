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
		$dat=new DomDocument("1.0","UTF-8");
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
		$dat=new DomDocument("1.0","UTF-8");
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
		file_put_contents("podaci.csv", $upis);
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
			<?php foreach($art->children() as $arts) {?>
				<option><?php echo $arts->Naziv; ?></option>
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
		<?php foreach($art->children() as $arts) {?>
			<option><?php echo $arts->Naziv; ?></option>
		<?php } ?>
		</select><br>

		<button type="submit" name="brisanje-artikla">Obrisi artikal</button>
	</form>
<?php endif; ?>


