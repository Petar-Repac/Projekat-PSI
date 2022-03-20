<header class="first-page center">

# Specifikacija scenarija upotrebe

## Autorizacija korisnika, moderatora i administratora

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

- [Specifikacija scenarija upotrebe](#specifikacija-scenarija-upotrebe)
  - [Autorizacija korisnika, moderatora i administratora](#autorizacija-korisnika-moderatora-i-administratora)
- [Istorija izmena](#istorija-izmena)
- [Sadržaj](#sadržaj)
- [Uvod](#uvod)
  - [Rezime](#rezime)
  - [Namena dokumenta i ciljne grupe](#namena-dokumenta-i-ciljne-grupe)
  - [Reference](#reference)
  - [Otvorena pitanja](#otvorena-pitanja)
- [Scenario kreiranja naloga](#scenario-kreiranja-naloga)
  - [Kratak opis](#kratak-opis)
  - [Tok događaja](#tok-događaja)
    - [Gost uspešno kreira korisnički nalog](#gost-uspešno-kreira-korisnički-nalog)
    - [Korisničko ime već postoji](#korisničko-ime-već-postoji)
    - [Lozinka ne ispunjava kriterijume](#lozinka-ne-ispunjava-kriterijume)
  - [Posebni zahtevi](#posebni-zahtevi)
- [Scenario autorizacije korisnika, moderatora, administratora](#scenario-autorizacije-korisnika-moderatora-administratora)
  - [Kratak opis](#kratak-opis-1)
  - [Tok događaja](#tok-događaja-1)
    - [Gost se uspešno prijavljuje](#gost-se-uspešno-prijavljuje)
    - [Pogrešno korisničko ime i/ili lozinka](#pogrešno-korisničko-ime-iili-lozinka)
    - [Nalogu je zabranjen pristup](#nalogu-je-zabranjen-pristup)
- [Scenario odjavljivanja sa sajta](#scenario-odjavljivanja-sa-sajta)
  - [Kratak opis](#kratak-opis-2)
  - [Tok događaja](#tok-događaja-2)
    - [Uspešno odjavljivanje](#uspešno-odjavljivanje)

</div>

===

# Uvod

## Rezime

Akcije vezane za pristup nalogu, odnosno:

- Kreiranje korisničkog naloga
- Autorizacija korisnika, moderatora i administratora
- Odjavljivanje sa sajta

## Namena dokumenta i ciljne grupe

Dokument služi članovima tima kao pomoć u izradi projekta.

## Reference

1. Projektni zadatak

## Otvorena pitanja

Nema

===

# Scenario kreiranja naloga

## Kratak opis

Gost može kreirati korisnički nalog tako što na stranici za registraciju unese traženo korisničko ime i lozinku. Ako podaci ispunjavaju određene kriterijume, nalog se uspešno kreira i gost se može ulogovati kao korisnik.

## Tok događaja

### Gost uspešno kreira korisnički nalog

1. Gost otvara stranicu za registraciju.
2. Gost popunjava formu za registraciju tako što unosi korisničko ime i lozinku.
3. Gost pritiska dugme "Registruj se". Njegov nalog se uspešno kreira i gost je sada ulogovan kao korisnik.

<div class="condition">Korisničko ime je jedinstveno, a lozinka ispunjava tražene kriterijume.</div>

<div class="effect">Novokreirani korisnik se čuva u bazi podataka.</div>

### Korisničko ime već postoji

1. Gost otvara stranicu za registraciju.
2. Gost popunjava formu za registraciju, pri čemu on unosi korisničko ime koje već postoji u bazi podataka.
3. Gost pritiska dugme "Registruj se" i pojavljuje se poruka koja obaveštava korisnika da mora izabrati drugo korisničko ime.

<div class="condition">U bazi podataka već postoji korisnik sa datim korisničkim imenom.</div>

### Lozinka ne ispunjava kriterijume

1. Gost otvara stranicu za registraciju.
2. Gost popunjava formu za registraciju, pri čemu lozinka koju unosi ne zadovoljava tražene kriterijume.
3. Gost pritiska dugme "Registruj se" i pojavljuje se poruka koja ga obaveštava da njegova lozinka ne ispunjava kriterijume.

## Posebni zahtevi

1. Potrebno je odrediti kriterijume za unos tako da korisnici ne mogu slučajno da unesu lozinku koja se lako može pogoditi, poput "123".
2. Na serverskoj strani, potrebno je heširati šifre pre nego što se smeste u bazu podataka. Na ovaj način se sprečava potencijalni *password leak* korisnika sajta u slučaju da je server kompromitovan.

===

# Scenario autorizacije korisnika, moderatora, administratora

## Kratak opis

Gost se može ulogovati tako što unese ispravno korisničko ime i lozinku naloga koji već postoji u bazi podataka.

## Tok događaja

### Gost se uspešno prijavljuje

1. Gost otvara stranicu za prijavljivanje.
2. Gost unosi tačno korisničko ime i lozinku.
3. Gost pritiska dugme "Prijavi se" i postaje ulogovan u svoj nalog.

<div class="condition">Gost ima korisnički nalog koji je prethodno kreiran.</div>

### Pogrešno korisničko ime i/ili lozinka

1. Gost otvara stranicu za prijavljivanje.
2. Gost unosi netačno korisničko ime i/ili lozinku.
3. Gost pritiska dugme "Prijavi se" i pojavljuje se poruka koja ga obaveštava da su njegovo korisničko ime i/ili lozinka neispravni.

### Nalogu je zabranjen pristup

1. Gost otvara stranicu za prijavljivanje.
2. Gost unosi tačno korisničko ime i/ili lozinku.
3. Gost pritiska dugme "Prijavi se" i pojavljuje se poruka koja ga obaveštava da je njegovom korisničkom nalogu zabranjen pristup od strane moderatora.

<div class="condition">Nalog postoji i njemu je zabranjen pristup.</div>

===

# Scenario odjavljivanja sa sajta

## Kratak opis

Korisnik u bilo kom trenutku može da odluči da se odjavi sa sajta pritiskom na dugme.

## Tok događaja

### Uspešno odjavljivanje

1. Korisnik/moderator/administrator pritiska dugme "Odjavi me" i vraća se u stanje gosta.

</main>