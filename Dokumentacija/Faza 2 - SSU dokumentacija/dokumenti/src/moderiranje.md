<header class="first-page center">

# Specifikacija scenarija upotrebe

## Moderiranje sadržaja

Autor: Vukašin Stepanović

Verzija: 1.0

</header>

===

# Istorija izmena

| Redni broj | Verzija | Kratak opis        | Autor              |
| ---------- | ------- | ------------------ | ------------------ |
| 1          | 1.0     | Inicijalna verzija | Vukašin Stepanović |

===

<main>

# Sadržaj

<div class="toc">

- [Sadržaj](#sadržaj)
- [Uvod](#uvod)
  - [Rezime](#rezime)
  - [Namena dokumenta i ciljne grupe](#namena-dokumenta-i-ciljne-grupe)
  - [Reference](#reference)
  - [Otvorena pitanja](#otvorena-pitanja)
- [Scenario zaključavanja objave](#scenario-zaključavanja-objave)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Moderator zaključa objavu](#moderator-zaključa-objavu)
    - [Moderator otključa objavu](#moderator-otključa-objavu)
  - [Posebni zahtevi](#posebni-zahtevi)

</div>

===

# Uvod

## Rezime

Akcije koje su dostupne moderatorima radi moderiranja sadržaja sajta, naime zaključavanje objava.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario zaključavanja objave

## Kratak opis

Moderator može zaključati objavu, čime se sprečava naknadno ostavljanje komentara, lajkova i dislajkova.

## Tok događaja

### Moderator zaključa objavu

1. Moderator pritiska dugme "Zaključaj" pored objave.
2. Korisnici više ne mogu da sprovode prethodno spomenute akcije.

<div class="condition">Objava je bila otključana.</div>

### Moderator otključa objavu

1. Moderator pritiska dugme "Otključaj" pored objave.
2. Korisnici sada ponovo mogu da ostavljaju komentare i slično.

<div class="condition">Objava je bila zaključana.</div>

## Posebni zahtevi

1. Potrebno je obratiti pažnju na situaciju gde korisnik učita objavu koja nije zaključana i pokuša da ostavi komentar, a objava u međuvremenu postane zaključana. U tom slučaju korisniku se treba prikazati relevantna poruka.

</main>