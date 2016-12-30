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

