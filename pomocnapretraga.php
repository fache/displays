 <?php
// Array with names
$citac=simplexml_load_file("proizvodi.xml") or die("Error: Cannot create object");
foreach($citac->children() as $produkt) {
	$a[] = $produkt->Naziv;
	$a[] = $produkt->ID;
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
	$brojac=10;
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
		$pom= strtolower($name);
        if ($q == substr($pom, 0, $len)) {
			$brojac=$brojac-1;
			
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
			if ($brojac==0) {break;}
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "nije pronadjen artikal iz pretrage" : $hint;
?> 