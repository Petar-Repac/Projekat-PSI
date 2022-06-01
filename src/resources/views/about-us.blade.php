<!-- Autor: Vukašin Stepanović -->

@extends('layouts.app')

@section('title', 'O nama')


@section('content')
    <div id="wrapper">

        <!-- One -->
        <div class="row">
            <div class="col-12">
                <!-- One -->
                <section id="one" class="wrapper">
                    <div class="inner">
                        <div class="spotlights">

                            <!-- Definicija -->
                            <div class="spotlight post">
                                <div class="content">
                                    <h2>O Kavujliji</h2>
                                    <p>Kavujlija je sajt za humorističke i satirične definicije sa jednom začkoljicom:
                                        <b>samo najbolje definicije opstaju.</b>
                                    </p>
                                    <p>Korisnici postavljaju maksimalno jednu definiciju dnevno,
                                        i glasaju za ostale definicije koje su postavljene u toku dana. <br>
                                        Sve novonastale definicije idu u <b>Čistilište</b> - prostor za definicije kojima
                                        još nije presuđeno. <br>
                                        Definicije koje prežive proces eliminacije idu u <b>Dvoranu slavnih</b> - gde će
                                        ostati dostupne svim korisnicima dok god je Kavujlije i besplatnog hostinga.
                                    </p>

                                </div>
                            </div>

                            <!-- Definicija -->
                            <div class="spotlight post">
                                <div class="content">
                                    <h2>O timu Tobago</h2>
                                    <p>
                                        Naziv tima potiče iz davnina, kada je jedan član tima drugom poslao mim (engl. meme)
                                        gde osoba pokušava da likvidira ogromnog pauka koristeći zdjelu. <br> Mim je poslat
                                        bez konteksta,
                                        jedina reč koju snimak sadrži jeste <b>Tobago</b>. <br>
                                        Pretpostavlja se da je Trinidad i Tobago poreklo gigantskog pauka čija je sudbina
                                        ostala neizvesna.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection
