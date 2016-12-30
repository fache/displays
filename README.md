NAPOMENA: pdf.zip fajl je potrebno raspakovati tako da folder "pdf" bude na istoj lokaciji kao ostale stranice i fajlovi.
<br><br>
Display Solutions
Display Solutions je firma koja se bavi proizvodnjom plasitke za marketinske svrhe u trgovackim lancima ili manjim prodavnicama. Razni proizvodi omogucavaju kupcima laksu uocljivost proizvoda, a samim prodavnicama olaksano upravljanje njima.

Faruk Slinic, 15475
<br>.................................................treca spirala...................................<br>

STA JE URADJENO:<br>
Napravljena je serijalizacija svih podataka u XML fajl proizvodi.xml. Na login USER:admin PASS:pass koji se testira u sifraadmin.xml biblioteci, adminu se prikazuju opcije u katalog.php stranici. Inace, do sada svaki html je uradjen kao php. Admin moze vrsiti unos, izmjenu i brisanje artikala.
Takodjer je omogucen download podataka podaci.csv koji sadrzi informacije o artiklima, i pregled izvjestaja u obliku pdf fajla. Uradjena je pretraga artikala po nazivu i ID-u. Prikazuje se do 10 stavki prema pretrazi, a po izvrsenju pretrage se prikazuju svi artikli koji je zadovoljavaju.

STA NIJE URADJENO:<br>
Nije validirana nijedna forma, deployment na OpenShift

LISTA FAJLOVA:<br>
NAZIV FAJLA - OPIS<br>
sifraadmin.xml - sifra admina za pristp admin dijelu<br>
proizvodi.xml - xml fajl u kome se cuvaju informacije o proizvodima<br>
podaci.csv - csv fajl u kome se cuvaju informacije o proizvodima<br>
downloadcsv.php - php stranica za download fajla podaci.php<br>
pronadjeniartikli.php - prikaz artikala nakon izvrsavanja admin pretrage<br>
pretraga.php - fajl za pretragu artikala<br>
pomocnapretraga.php - koristi se sa pretraga.php, za prolazak kroz proizvodi.xml<br>
pdfizvjestaj.php - kod za prewiev pdf izvjestaja<br>
log.php - kod za logiranje admina<br>
log-form.php - forma za logiranje<br>
admin-panel.php - kod za prikaz opcija koje vidi samo admin<br>
javascript - fajl za javascript<br>
index.php - pocetna stranica (O nama)<br>
katalog.php - html stranica u kojoj je prikazan katalog proizvoda<br>
kontakt.php - stranica u kojoj su prikazani kontakti firme<br>
solucije.php - stranica u kojoj su prikazane Merchandising solucije<br>
uslovi.php - stranica u kojoj su prikazani uslovi poslovanja sa firmom<br>
stil.css - eksterni css fajl za ostale stranica <br>
38.jpg - slika na vrhu svake stranice<br>
misija.jpg - slika za O nama stranicu<br>
zamrznuta_hrana.jpg - slika za Merchandising solucije<br>
hrana_za_bebe.jpg - slika za Merchandising solucije<br>
proizvodi_po_kilazi.jpg - slika za Merchandising solucije<br>
145.jpg - slika za Katalog<br>
159.jpg - slika za Katalog<br>
350.jpg - slika za Katalog<br>
694.jpg - slika za Katalog<br>
760.jpg - slika za Katalog<br>
770.jpg - slika za Katalog<br>
781.jpg - slika za Katalog<br>
index.jpg - skica<br>
solucije.jpg - skica<br>
katalog.jpg - skica<br>
uslovi.jpg - skica<br>
kontakt.jpg - skica<br>
katalog-mobilna.jpg - skica<br>
solucije-mobilna.jpg - skica<br>


.................................................druga i prva spirala...................................<br>
STA JE URADJENO:<br>
Sva polja formi su validirana, na prazna polja i onchange() button se disable i prikazuje se greska<br>
Dropdown meni je uradjen na index strani, sa dugmetom nasa misija<br>
Dropdown meni je uradjen na index strani, sa dugmetom nasa misija<br>
Carousel je uradjen uz pomoc biblioteke, link na njega je na kraju index stranice<br>
<br>
5 skica za desktop i 2 za mobilnu verziju (ostale 3 stranice su iste zbog responsive dizajna)<br>
5 stranica: O nama, Mechandising solucije, Katalog, Uslovi poslovanja, Kontakt<br>
Na svakoj stranici je isti body stil, meni i slika koja mjenja slider<br>
Sve stranice su responzivne<br>
Media query je uradjen za ispod 600px<br>
Implementirane su tri html forme, na Katalog stranici, Uslovi saradnje i Kontakt<br>
Uradjen je meni koji se nalazi na svim stranicama<br>

STA NIJE URADJENO:<br>
Prva slika sluzi kao slider koji nije uradjen<br>
U Merchandising solucijama nisu napravljene stranice za koje su dati linkovi<br>
U Katalogu su prikazane samo slike umjesto kategorija i proizvoda<br>
Forme nisu funkcionalne<br>

BUGOVI ZA KOJE SU POZNATA RJESENJA:

BUGOVI ZA KOJE NISU POZNATA RJESENJA:

LISTA FAJLOVA:<br>
NAZIV FAJLA - OPIS<br>
javascript - fajl za javascript<br>
crsl.html - html fajl za Carousel<br>
stil2.css - stil za Carousel<br>
<br>
index.html - pocetna stranica (O nama)<br>
katalog.html - html stranica u kojoj je prikazan katalog proizvoda<br>
kontakt.html - stranica u kojoj su prikazani kontakti firme<br>
solucije.html - stranica u kojoj su prikazane Merchandising solucije<br>
uslovi.html - stranica u kojoj su prikazani uslovi poslovanja sa firmom<br>
stil.css - eksterni css fajl za ostale stranica <br>
38.jpg - slika na vrhu svake stranice<br>
misija.jpg - slika za O nama stranicu<br>
zamrznuta_hrana.jpg - slika za Merchandising solucije<br>
hrana_za_bebe.jpg - slika za Merchandising solucije<br>
proizvodi_po_kilazi.jpg - slika za Merchandising solucije<br>
145.jpg - slika za Katalog<br>
159.jpg - slika za Katalog<br>
350.jpg - slika za Katalog<br>
694.jpg - slika za Katalog<br>
760.jpg - slika za Katalog<br>
770.jpg - slika za Katalog<br>
781.jpg - slika za Katalog<br>
index.jpg - skica<br>
solucije.jpg - skica<br>
katalog.jpg - skica<br>
uslovi.jpg - skica<br>
kontakt.jpg - skica<br>
katalog-mobilna.jpg - skica<br>
solucije-mobilna.jpg - skica<br>
