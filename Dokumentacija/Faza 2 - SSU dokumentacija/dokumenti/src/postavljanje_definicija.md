<header class="first-page center">

# Specifikacija scenarija upotrebe

## Postavljanje definicija na platformu

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
    - [Korisnik uspešno pristupa stranici](#korisnik-uspešno-pristupa-stranici)
    - [Korisnik je već postavio definiciju na današnji datum](#korisnik-je-već-postavio-definiciju-na-današnji-datum)
    - [Gost pokušava da pristupi stranici](#gost-pokušava-da-pristupi-stranici)
  - [Posebni zahtevi](#posebni-zahtevi)
- [Scenario sastavljanja i postavljanja definicije](#scenario-sastavljanja-i-postavljanja-definicije)
  - [Kratak opis](#kratak-opis-1)
  - [Tok događaja](#tok-događaja-1)
    - [Korisnik uspešno sastavlja definiciju](#korisnik-uspešno-sastavlja-definiciju)
    - [Prazan naslov i/ili sadržaj](#prazan-naslov-iili-sadržaj)
    - [Prekoračeno ograničenje karaktera za naslov/sadržaj definicije](#prekoračeno-ograničenje-karaktera-za-naslovsadržaj-definicije)

</div>

===

# Uvod

## Rezime

Akcije vezane za postavljanje jedne definicije, to jest:

- Pristup formi za pisanje definicije
- Pisanje i objava definicije pomoću forme

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario pristupa stranici sa formom za pisanje definicije

## Kratak opis

Autorizovani korisnici (standardni korisnik, moderator i administrator) imaju pravo pristupa formi za pisanje definicije.
Dozvoljeno je postavljanje samo jedne definicije dnevno, nakon objave link/dugme za stranicu s formom biće nefunkcionalno do kraja dana.
Ukoliko gost pokuša da pristupi stranici sa formom biće preusmeren na početnu stranu.

## Tok događaja

### Korisnik uspešno pristupa stranici

1. Korisnik klikom na link/dugme otvara stranicu sa formom za pisanje definicije.
2. Stranica sa formom se prikazuje i korisnik može napisati svoju definiciju. 

<div class="condition">Korisnik je prijavljen na platformi.</div>
<div class="condition">Korisnik nije postavio definiciju na današnji datum.</div>

### Korisnik je već postavio definiciju na današnji datum

1. Stranica sa formom preusmerava korisnika na početnu stranu.
2. Na početnoj strani se prikazuje obaveštenje korisniku: "Već ste objavili definiciju za današnji dan".

<div class="condition">Korisnik je prijavljen na platformi.</div>
<div class="condition">Korisnik je postavio definiciju na današnji datum.</div>

### Gost pokušava da pristupi stranici 

1. Stranica sa formom preusmerava gosta na početnu stranu
2. Na početnoj strani se prikazuje obaveštenje gostu: "Morate se prijaviti da biste postavljali definicije".

## Posebni zahtevi

1. Potrebno je obezbediti da gostu, kao i korisnicima koji su već objavili definiciju na današnji datum link ka stranici sa formom ne bude
   prikazan na sajtu.
2. Na svakoj stranici je potrebno izvršiti proveru korisničkih privilegija, i na adekvatan način razrešiti moguće konflikte.

===

# Scenario sastavljanja i postavljanja definicije

## Kratak opis

Nakon što je pristupio stranici sa formom za pisanje definicije, autorizovani korisnik može objaviti definiciju nakon što popuni formu.

## Tok događaja

### Korisnik uspešno sastavlja definiciju

1. Korisnik otvara stranicu za pisanje definicije.
2. Korisnik unosi naslov i sadržaj definicije.
3. Korisnik pritiska dugme "Postavi", pojavljuje se obaveštenje: "Vaša definicija je uspešno postavljena!".

<div class="condition">Korisnik je uspešno pristupio stranici sa formom za pisanje definicije.</div>

### Prazan naslov i/ili sadržaj

1. Korisnik otvara stranicu za pisanje definicije.
2. Korisnik ostavlja polje za sadržaj i/ili za naslov prazno.
3. Korisnik pritiska na dugme "Postavi", pojavljuje se obaveštenje: "Naslov i sadržaj definicije moraju biti popunjeni".

<div class="condition">Korisnik je uspešno pristupio stranici sa formom za pisanje definicije.</div>

### Prekoračeno ograničenje karaktera za naslov/sadržaj definicije

1. Korisnik otvara stranicu za pisanje definicije.
2. Korisnik popunjava polje za naslov i/ili sadržaj definicije sa previše karaktera.
3. Korisnik pritiska na dugme "Postavi", pojavljuje se obaveštenje: "Sadržaj/naslov Vaše definicije ima previše karaktera. Dozvoljen broj     karaktera je XXXX".

<div class="condition">Korisnik je uspešno pristupio stranici sa formom za pisanje definicije.</div>
</main>