$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});








function padajuca() {
    document.getElementById("link-padajuci").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.klik-meni')) {

    var dropdowns = document.getElementsByClassName("linkovi-padajuci");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function validacijaFormeKat() {

	var kaime = document.forms["katalog-forma"]["firstname"].value;
	var kaprezime = document.forms["katalog-forma"]["lastname"].value;
	var kabroj = document.forms["katalog-forma"]["brojtel"].value;
	var kamail = document.forms["katalog-forma"]["mail"].value;
	var kaporuka = document.forms["katalog-forma"]["message"].value;

	if (kaime == "Ime" || kaime == "") {
		document.getElementById("kaimegr").innerHTML = "Molimo popunite polje Vaše ime";
		document.getElementById("kaprezimegr").innerHTML = "";
		document.getElementById("kabrojgr").innerHTML = "";
		document.getElementById("kamailgr").innerHTML = "";
		document.getElementById("kaporukagr").innerHTML = "";
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	else if (kaprezime == "Prezime" || kaprezime == "") {
		document.getElementById("kaimegr").innerHTML = "";
		document.getElementById("kaprezimegr").innerHTML = "Molimo popunite polje Vaše prezime";
		document.getElementById("kabrojgr").innerHTML = "";
		document.getElementById("kamailgr").innerHTML = "";
		document.getElementById("kaporukagr").innerHTML = "";
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	else if (kabroj == "Br. tel." || kabroj == "") {
		document.getElementById("kaimegr").innerHTML = "";
		document.getElementById("kaprezimegr").innerHTML = "";
		document.getElementById("kabrojgr").innerHTML = "Molimo popunite polje Broj telefona";
		document.getElementById("kamailgr").innerHTML = "";
		document.getElementById("kaporukagr").innerHTML = "";
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	else if (kamail == "e-mail" || kamail == "") {
		document.getElementById("kaimegr").innerHTML = "";
		document.getElementById("kaprezimegr").innerHTML = "";
		document.getElementById("kabrojgr").innerHTML = "";
		document.getElementById("kamailgr").innerHTML = "Molimo popunite polje za e-mail";
		document.getElementById("kaporukagr").innerHTML = "";
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	else if (kaporuka == "Unesite artikle i količinu" || kaporuka == "") {
		document.getElementById("kaimegr").innerHTML = "";
		document.getElementById("kaprezimegr").innerHTML = "";
		document.getElementById("kabrojgr").innerHTML = "";
		document.getElementById("kamailgr").innerHTML = "";
		document.getElementById("kaporukagr").innerHTML = "Molimo unesite artikle i kolicinu";
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	else{
		
		document.getElementById("kaimegr").innerHTML = "";
		document.getElementById("kaprezimegr").innerHTML = "";
		document.getElementById("kabrojgr").innerHTML = "";
		document.getElementById("kamailgr").innerHTML = "";
		document.getElementById("kaporukagr").innerHTML = "";
		document.getElementById("posalji3").disabled=false;
	}
	
}

function validacijaSubmitU() {
	var uime = document.forms["uslovi-forma"]["firstname"].value;
	var uprezime = document.forms["uslovi-forma"]["lastname"].value;
	var ubroj = document.forms["uslovi-forma"]["brojtel"].value;
	var umail = document.forms["uslovi-forma"]["mail"].value;

	if (uime == "Ime" || uime == "" || uprezime == "Prezime" || uprezime == "" || ubroj == "Br. tel." || ubroj == "" || umail == "e-mail" || umail == "") {
		document.getElementById("posalji3").disabled=true;
		return false;
	}
	
}





function validacijaFormeU() {
	var uime = document.forms["uslovi-forma"]["firstname1"].value;
	var uprezime = document.forms["uslovi-forma"]["lastname1"].value;
	var ubroj = document.forms["uslovi-forma"]["brojtel"].value;
	var umail = document.forms["uslovi-forma"]["mail"].value;
	

	if (uime == "Ime" || uime == "") {
		document.getElementById("uimegr").innerHTML = "Molimo popunite polje Vaše ime";
		document.getElementById("uprezimegr").innerHTML = "";
		document.getElementById("ubrojgr").innerHTML = "";
		document.getElementById("umailgr").innerHTML = "";
		document.getElementById("posalji2").disabled=true;
		return false;
	}
	else if (uprezime == "Prezime" || uprezime == "") {
		document.getElementById("uimegr").innerHTML = "";
		document.getElementById("uprezimegr").innerHTML = "Molimo popunite polje Vaše prezime";
		document.getElementById("ubrojgr").innerHTML = "";
		document.getElementById("umailgr").innerHTML = "";
		document.getElementById("posalji2").disabled=true;
		return false;
	}
	else if (ubroj == "Br. tel." || ubroj == "") {
		document.getElementById("uimegr").innerHTML = "";
		document.getElementById("uprezimegr").innerHTML = "";
		document.getElementById("ubrojgr").innerHTML = "Molimo popunite polje Broj telefona";
		document.getElementById("umailgr").innerHTML = "";
		document.getElementById("posalji2").disabled=true;
		return false;
	}
	else if (umail == "e-mail" || umail == "") {
		document.getElementById("uimegr").innerHTML = "";
		document.getElementById("uprezimegr").innerHTML = "";
		document.getElementById("ubrojgr").innerHTML = "";
		document.getElementById("umailgr").innerHTML = "Molimo popunite polje za e-mail";
		document.getElementById("posalji2").disabled=true;
		return false;
	}
	else{
		
		document.getElementById("uimegr").innerHTML = "";
		document.getElementById("uprezimegr").innerHTML = "";
		document.getElementById("ubrojgr").innerHTML = "";
		document.getElementById("umailgr").innerHTML = "";
		document.getElementById("posalji2").disabled=false;
	}
	
}

function validacijaSubmitU() {
	var uime = document.forms["uslovi-forma"]["firstname"].value;
	var uprezime = document.forms["uslovi-forma"]["lastname"].value;
	var ubroj = document.forms["uslovi-forma"]["brojtel"].value;
	var umail = document.forms["uslovi-forma"]["mail"].value;

	if (uime == "Ime" || uime == "" || uprezime == "Prezime" || uprezime == "" || ubroj == "Br. tel." || ubroj == "" || umail == "e-mail" || umail == "") {
		document.getElementById("posalji2").disabled=true;
		return false;
	}
	
}




function validacijaFormeK() {
	
	var kime = document.forms["kontakt-forma"]["firstname"].value;
	var kprezime = document.forms["kontakt-forma"]["lastname"].value;
	var kporuka = document.forms["kontakt-forma"]["message"].value;

	if (kime == "Ime" || kime == "") {
		document.getElementById("kimegr").innerHTML = "Molimo popunite polje Vaše ime";
		document.getElementById("kprezimegr").innerHTML = "";
		document.getElementById("kporukagr").innerHTML = "";
		document.getElementById("posalji").disabled=true;
		return false;
	}
	else if (kprezime == "Prezime" || kprezime == "") {
		document.getElementById("kimegr").innerHTML = "";
		document.getElementById("kprezimegr").innerHTML = "Molimo popunite polje Vaše prezime";
		document.getElementById("kporukagr").innerHTML = "";
		document.getElementById("posalji").disabled=true;
		return false;
	}
	else if (kporuka == "Postavite pitanje..." || kporuka == "") {
		document.getElementById("kimegr").innerHTML = "";
		document.getElementById("kprezimegr").innerHTML = "";
		document.getElementById("kporukagr").innerHTML = "Molimo popunite polje za pitanje";
		document.getElementById("posalji").disabled=true;
		return false;
	}
	else{
		
		document.getElementById("kimegr").innerHTML = "";
		document.getElementById("kprezimegr").innerHTML = "";
		document.getElementById("kporukagr").innerHTML = "";
		document.getElementById("posalji").disabled=false;
	}
}

function validacijaSubmitK() {
	var kime = document.forms["kontakt-forma"]["firstname"].value;
	var kprezime = document.forms["kontakt-forma"]["lastname"].value;
	var kporuka = document.forms["kontakt-forma"]["message"].value;

	if (kime == "Ime" || kime == "" || kprezime == "Prezime" || kprezime == "" || kporuka == "Postavite pitanje..." || kporuka == "") {
		document.getElementById("posalji").disabled=true;
		return false;
	}
}