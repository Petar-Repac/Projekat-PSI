<header class="first-page center">

# Specifikacija scenarija upotrebe

## Postavljanje komentara na definicije

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
    - [Korisnik uspešno postavlja komentar na definiciju](#korisnik-uspešno-postavlja-komentar-na-definiciju)
    - [Korisnik pokušava da postavi prazan komentar](#korisnik-pokušava-da-postavi-prazan-komentar)
    - [Prekoračeno ograničenje karaktera za komentar](#prekoračeno-ograničenje-karaktera-za-komentar)
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

# Scenario postavljanja komentara na definiciju

## Kratak opis

Autorizovani korisnici (standardni korisnik, moderator i administrator) imaju pravo komentarisanja na definicijama. Komentari nemaju nikakav uticaj na metriku objave dana, već samo služe kao način interakcije među korisnicima.

## Tok događaja

### Korisnik uspešno postavlja komentar na definiciju

1. Korisnik klikom na link otvara stranicu definicije.
2. Korisnik u odeljku "Komentari" klikne na dugme "Komentariši".
3. Korisnik popunjava polje za komentar i klikne na dugme "Postavi".
4. Komentar se prikazuje u odeljku "Komentari" date definicije. 

<div class="condition">Korisnik je prijavljen na platformi.</div> 

### Korisnik pokušava da postavi prazan komentar

1. Korisnik klikom na link otvara stranicu definicije.
2. Korisnik u odeljku "Komentari" klikne na dugme "Komentariši".
3. Korisnik popunjava polje za komentar i klikne na dugme "Postavi".
4. Komentar se prikazuje u odeljku "Komentari" date definicije, korisnik
   dobija obaveštenje: "Komentar uspešno postavljen!". 

<div class="condition">Korisnik je prijavljen na platformi.</div> 

### Prekoračeno ograničenje karaktera za komentar

1. Korisnik klikom na link otvara stranicu definicije.
2. Korisnik u odeljku "Komentari" klikne na dugme "Komentariši".
3. Korisnik popunjava polje za komentar i klikne na dugme "Postavi".
3. Pojavljuje se obaveštenje: "Sadržaj/naslov Vaše definicije ima previše karaktera. Dozvoljen broj  karaktera je XXXX".

<div class="condition">Korisnik je prijavljen na platformi.</div> 

## Posebni zahtevi
1. Potrebno je obezbediti da gostu ne bude dostupno dugme "Komentariši".

</main>