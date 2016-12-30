
<h3>Pretrazite po nazivu ili ID-u artikla:</h3>

<form action="pronadjeniartikli.php" method="post"> 
<input type="text" name="trazilica" id="txt1" onkeyup="showHint(this.value)">
<button type="submit" name="pretrazi">pretrazi</button>
</form>

<p>Prijedlozi: <span id="txtHint"></span></p> 

<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "pomocnapretraga.php?q="+str, true);
  xhttp.send();   
}
</script>

</body>






<!--
<form action="pretraga.php" method="post">
	<input type="text" name="search" placeholder="Pretrazi katalog">
	<input type="submit" value="Trazi">	
</form>
-->