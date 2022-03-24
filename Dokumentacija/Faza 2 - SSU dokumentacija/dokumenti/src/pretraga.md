<header class="first-page center">

# Specifikacija scenarija upotrebe

## Pretraga definicija na platformi

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
    - [Korisnik vrši pretragu po kriterijumu "Najbolje"](#korisnik-vrši-pretragu-po-kriterijumu-najbolje)
    - [Korisnik vrši pretragu po kriterijumu "Najgore"](#korisnik-vrši-pretragu-po-kriterijumu-najgore)
    - [Korisnik vrši pretragu po kriterijumu "Kontroverzne"](#korisnik-vrši-pretragu-po-kriterijumu-kontroverzne)
    - [Korisnik vrši pretragu po ključnoj reči](#korisnik-vrši-pretragu-po-ključnoj-reči)

</div>

===

# Uvod

## Rezime

Akcije vezane za pretragu definicija.

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario pretrage definicija po različitim kriterijumima

## Kratak opis

Svi korisnici na platformi imaju mogućnost pretrage definicija na stranicama "Dvorana slavnih" (definicije koje su prošle eliminaciju) i "Čistilište" (definicije koje su kandidati za "Dvoranu slavnih") po sledećim kriterijumima:

- Najbolje
- Najgore
- Kontroverzne
- Po ključnoj reči

## Tok događaja

### Korisnik vrši pretragu po kriterijumu "Najbolje" 

1. Korisnik u odeljku "pretraga" na stranici klikne na dugme "Sortiraj najbolje".
2. Na stranici se prikazuju definicije sa najviše "+", a najmanje "-" glasova.


### Korisnik vrši pretragu po kriterijumu "Najgore"

1. Korisnik u odeljku "pretraga" na stranici klikne na dugme "Sortiraj najgore".
2. Na stranici se prikazuju definicije sa najviše "-", a najmanje "+" glasova.

### Korisnik vrši pretragu po kriterijumu "Kontroverzne"

1. Korisnik u odeljku "pretraga" na stranici klikne na dugme "Sortiraj kontroverzne".
2. Na stranici se prikazuju definicije gde je odnos "+" i "-" glasova približan 50%, gde prednost dobijaju one sa više sveukupnih glasova.


### Korisnik vrši pretragu po ključnoj reči

1. Korisnik u odeljku "pretraga" u polju za pretragu po ključnoj reči unosi argument pretrage.
2. Na stranici se prikazuju definicije koje po sadržaju, naslovu ili nazivu autora najviše odgovaraju datom argumentu.

</main>