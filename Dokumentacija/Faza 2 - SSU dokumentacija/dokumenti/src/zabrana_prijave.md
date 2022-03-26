<header class="first-page center">

# Specifikacija scenarija upotrebe

## Zabrana prijave korisnika

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
- [Scenario zabrane prijave korisnika](#scenario-zabrane-prijave-korisnika)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Moderator zabranjuje pristup](#moderator-zabranjuje-pristup)
    - [Moderator otklanja zabranu pristupa](#moderator-otklanja-zabranu-pristupa)

</div>

===

# Uvod

## Rezime

Ovo je privilegija dostupna moderatoru koja mu dozvoljava da nekom korisniku zabrani pristup nalogu, najčešće usled kršenja pravila foruma.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

| Redni broj | Opis                                                                                    | Rešenje |
|------------|-----------------------------------------------------------------------------------------|---------|
| 1          | Pored zabrane pristupa, da li je dodatno potrebno i ukloniti sve privilegije korisnika? |         |

===

# Scenario zabrane prijave korisnika

## Kratak opis

Moderator stavlja, odnosno uklanja zabranu pristupa korisniku.

## Tok događaja

### Moderator zabranjuje pristup

1. Moderator otvara stranicu dotičnog korisnika.
2. Moderator pritiska dugme "Zabrani pristup nalogu".
3. Dotični korisnik gubi pristup svom nalogu.

<div class="condition">Pristup korisničkom nalogu nije zabranjen.</div>

### Moderator otklanja zabranu pristupa

1. Moderator otvara stranicu dotičnog korisnika.
2. Moderator pritiska dugme "Ukloni zabranu pristupa nalogu".
3. Dotični korisnik ponovo dobija mogućnost pristupa nalogu.

<div class="condition">Pristup korisničkom nalogu je zabranjen.</div>

</main>