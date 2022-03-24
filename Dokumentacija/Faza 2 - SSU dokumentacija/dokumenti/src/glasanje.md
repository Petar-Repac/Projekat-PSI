<header class="first-page center">

# Specifikacija scenarija upotrebe

## Glasanje za definicije

Autor: Petar Repac

Verzija: 1.0

</header>

===

# Istorija izmena

| Redni broj | Verzija | Kratak opis        | Autor              |
| ---------- | ------- | ------------------ | ------------------ |
| 1          | 1.0     | Inicijalna verzija | Petar Repac        |

===

<main>

# Sadržaj

<div class="toc"> 

- [Uvod](#uvod)
  - [Rezime](#rezime)
  - [Namena dokumenta i ciljne grupe](#namena-dokumenta-i-ciljne-grupe)
  - [Reference](#reference)
  - [Otvorena pitanja](#otvorena-pitanja)
- [Scenario pristupa stranici sa formom za pisanje definicije](#scenario-pristupa-stranici-sa-formom-za-pisanje-definicije)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Korisnik postavlja glas na definiciju](#korisnik-postavlja-glas-na-definiciju)
    - [Korisnik uklanja glas sa definicije](#korisnik-uklanja-glas-sa-definicije)
    - [Korisnik menja glas na definiciji](#korisnik-menja-glas-na-definiciji)
    - [Gost pokušava da glasa na definiciji](#gost-pokušava-da-glasa-na-definiciji)
  - [Posebni zahtevi](#posebni-zahtevi)

</div>

===

# Uvod

## Rezime

Akcije vezane za postavljanje komentara na definiciju.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario pristupa stranici sa formom za pisanje definicije

## Kratak opis

Autorizovani korisnici (standardni korisnik, moderator i administrator) imaju pravo glasanja na definicijama (lajk: + | dislajk: - ).

## Tok događaja

### Korisnik postavlja glas na definiciju 

1. Korisnik klikne na dugme "+" ili na dugme "-".
2. Broj odgovarajućih glasova na datoj definiciji se uvećava za 1.

<div class="condition">Korisnik je prijavljen na platformi.</div> 
<div class="condition">Korisnik nema postavljen glas na datoj definiciji</div> 

### Korisnik uklanja glas sa definicije

1. Korisnik klikne na dugme "+" ili na dugme "-" u zavisnosti od toga da li je glasao "+" ili "-" ranije.
2. Broj odgovarajućih glasova na datoj definiciji se umanjuje za 1.

<div class="condition">Korisnik je prijavljen na platformi.</div> 
<div class="condition">Korisnik ima postavljen glas na datoj definiciji</div> 

### Korisnik menja glas na definiciji

1. Korisnik klikne na dugme "+" ili na dugme "-" u zavisnosti od toga da li je glasao "-" ili "+".
2. Broj odgovarajućih glasova na datoj definiciji se umanjuje za 1, a drugih uvećava za 1.

<div class="condition">Korisnik je prijavljen na platformi.</div> 
<div class="condition">Korisnik ima postavljen glas na datoj definiciji</div> 


### Gost pokušava da glasa na definiciji

1. Gost klikne na dugme "+" ili na dugme "-" u zavisnosti od toga da li je glasao "-" ili "+".
2. Prikazuje se obaveštenje: "Morate se prijaviti kako biste glasali za definiciju dana!".


</main>