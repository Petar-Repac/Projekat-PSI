<header class="first-page center">

# Specifikacija scenarija upotrebe

## Automatski odabir objave dana

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
- [Scenario prijave korisnika nakon pobede](#scenario-prijave-korisnika-nakon-pobede)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Korisnik se prijavljuje](#korisnik-se-prijavljuje)

</div>

===

# Uvod

## Rezime

Iz skupa kandidata za objavu dana na kraju dana u 23:59 se automatski bira pobednik. Ako je prijavljeni korisnik kreirao neku kandidat-definiciju, on biva obavešten prilikom sledećeg prijavljivanja na nalog o tome da li je njegova definicija pobedila.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario prijave korisnika nakon pobede

## Kratak opis

Korisnik dobija obaveštenje.

## Tok događaja

### Korisnik jeste pobedio

1. Gost se prijavljuje na svoj korisnički nalog.
2. Korisnik dobija obaveštenje koje mu govori da je njegova definicija izabrana kao pobednik. Ova poruka se prikazuje samo jednom prilikom prijavljivanja.

<div class="condition">Korisnikova definicija je izabrana kao pobednička.</div>

### Korisnik nije pobedio

1. Gost se prijavljuje na svoj korisnički nalog.
2. Korisnik dobija obaveštenje koje mu govori da njegova definicija nije izabrana kao pobednik. Ova poruka se prikazuje samo jednom prilikom prijavljivanja. Korisnikova kandidat-definicija biva obrisana od strane sistema.

<div class="condition">Korisnikova definicija nije izabrana kao pobednička.</div>

</main>