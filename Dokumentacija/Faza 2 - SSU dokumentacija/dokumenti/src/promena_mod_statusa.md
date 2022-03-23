<header class="first-page center">

# Specifikacija scenarija upotrebe

## Promena moderatorskog statusa

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

- [Uvod](#uvod)
  - [Rezime](#rezime)
  - [Namena dokumenta i ciljne grupe](#namena-dokumenta-i-ciljne-grupe)
  - [Reference](#reference)
  - [Otvorena pitanja](#otvorena-pitanja)
- [Scenario dodeljivanja uloge moderatora](#scenario-dodeljivanja-uloge-moderatora)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Administrator dodaje ulogu moderatora](#administrator-dodaje-ulogu-moderatora)
    - [Administrator uklanja ulogu moderatora](#administrator-uklanja-ulogu-moderatora)

</div>

===

# Uvod

## Rezime

Administrator ima sposobnost da korisniku dodeli, odnosno ukloni status moderatora.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario dodeljivanja uloge moderatora

## Kratak opis

Administrator dodeljuje, odnosno uklanja status moderatora nekog korisnika.

## Tok događaja

### Administrator dodaje ulogu moderatora

1. Administrator otvara stranicu dotičnog korisnika.
2. Administrator pritiska dugme "Dodeli ulogu moderatora".
3. Korisnik postaje moderator i dobija dodatne privilegije.

<div class="condition">Korisnik nije bio moderator.</div>

### Administrator uklanja ulogu moderatora

1. Administrator otvara stranicu dotičnog moderatora.
2. Administrator pritiska dugme "Ukloni ulogu moderatora".
3. Moderator gubi dodatne privilegije i postaje običan korisnik.

<div class="condition">Dotični korisnik je imao status moderatora.</div>

</main>