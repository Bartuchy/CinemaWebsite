<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/style.css" rel="stylesheet"/>
        <link href="CSS/popup.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <script src="JS/skryptFetch.js"></script>
        
        <title>Kino</title>
    </head>
    
    <body>
        <section class="log-bar">
            <p><a class="prof-form">Profil</a></p>
            <p><a href='index.php?akcja=wyloguj' class="logout">Wyloguj</a></p>
        </section>

        <?php
            include_once "funkcje.php";
            include_once "klasy/Baza.php";
            
            $db = new Baza("localhost", "root", "", "cinema");
            
            secureLog($db);
            echo "Pomyślnie zalogowano";
            
            if(filter_input(INPUT_POST, "submit")){
                $akcja = filter_input(INPUT_POST, "submit");
                switch($akcja){
                    case "Zapisz":
                        updateUserData($db);
                    break; 

                    case "Zarezerwuj":
                        reserveTicket($db);
                    break;
                    
                    case "Usun":
                        removeTicket($db);
                    break;

                    case "Zapisz zmiany":
                        saveEditedTicketData($db);
                    break;
                }
            }
        ?>

        <!-- edycja danych użytkownika -->
        <div class="bg-modal-reg">
            <div class="modal-content-reg">
                <div class="close">+</div><br>
                <form action="indexLogged.php" method="POST">
                    <table id="form">
                        <caption><h2>Edycja danych Użytkownika</h2></caption>
                        <tr>
                            <td>Imię</td>
                            <td><input id="imie_reg" name="imie_reg" type="text" required></td>
                        </tr>
        
                        <tr>
                            <td>Nazwisko</td>
                            <td><input id="nazwisko_reg" name="nazwisko_reg" type="text" required></td>
                        </tr>
        
                        <tr>
                            <td>Wiek</td>
                            <td><input id="wiek_reg" name="wiek_reg" type="number" name="wiek" required></td>
                        </tr>

                        <tr>
                            <td>E-mail</td>
                            <td><input id="email_reg" name="email_reg" type="email" placeholder="mojmail@xx.xx" required></td>
                        </tr>
        
                        <tr>
                            <td>Nr Telefonu</td>
                            <td><input id="nrtel_reg" name="nrtel_reg" type="text" placeholder="+48 123-123-123" required></td>
                        </tr>
                        <tr>
                            <td>Hasło</td>
                            <td><input id="passwd_reg" name="passwd_reg" type="text" required></td>
                        </tr>
                    </table>
                    <input class="button" type="submit" name="submit" value="Zapisz">
                </form>
            </div>
        </div>

        <!-- rezerwacja -->
        <div class="bg-modal-res">
            <div class="modal-content-res">
                <div class="close">+</div><br>
                <form action="indexLogged.php" method="POST">
                    <table id="form">
                        <caption><h2>Rezerwacja wirtualnego biletu</h2></caption>
                        <tr>
                            <td>Tytuł filmu</td>
                            <td>
                                <select id="title" name="title">
                                    <option value="Jeden gniewny człowiek">Jeden gniewny człowiek</option>
                                    <option value="Ciche miejsce 2">Ciche miejsce 2</option>
                                    <option value="Cruella">Cruella</option>
                                    <option value="Mortal Combat">Mortal Combat</option>
                                    <option value="Druga połowa">Druga połowa</option>
                                    <option value="Avatar">Avatar</option>
                                    <option value="Avengers">Avengers</option>
                                    <option value="Hobbit">Hobbit</option>
                                    <option value="Kung fu Panda 2">Kung fu Panda 2</option>
                                    <option value="Batman">Batman</option>
                                    <option value="Pinokio">Pinokio</option>
                                    <option value="Venom">Venom</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Seansu</td>
                            <td><input id="date_res" name="date_res" type="date" required></td>
                        </tr>
        
                        <tr>
                            <td>Język Dubbingu</td>
                            <td>
                                <select id="jezyk" name="jezyk">
                                    <option value="Oryginalny">Oryginalny</option>
                                    <option value="Polski">Polski</option>
                                    <option value="Angielski">Angielski</option>
                                    <option value="Hiszpański">Hiszpański</option>
                                    <option value="Niemiecki">Niemiecki</option>
                                    <option value="Francuski">Francuski</option>
                                </select>
                            </td>
                        </tr>
                    </table><br>

                    <b>Szczegóły</b><br>
                    <?php
                        $szczegoly = ["Z napisami", "Opcja 3D", "Wersja reżyserska"];
                        echo "<input id='ch1' class='ckeck' name='szczegol[]' type='checkbox' value='Z napisami'>Z napisami";
                        echo "<input id='ch2' class='ckeck' name='szczegol[]' type='checkbox' value='Opcja 3D'>Opcja 3D";
                        echo "<input id='ch3' class='ckeck' name='szczegol[]' type='checkbox' value='Wersja reżyserska'>Wersja reżyserska";
                        echo "<br><br>";
                    ?>
                    
                    <b>Płatność</b><br>
                    <input id="rad1" class="radio" name="platnosc" type="radio" value="visa" checked>Visa
                    <input id="rad2" class="radio" name="platnosc" type="radio" value="mastercard">MasterCard
                    <input id="rad3" class="radio" name="platnosc" type="radio" value="blik">Blik<br>

                    <input class="button" type="submit" name="submit" value="Zarezerwuj">
                    <input class="button" type="reset" value="Anuluj">
                </form>
            </div>
        </div>
        
        <!-- edycja rezerwacji -->
        <div class="bg-modal-res-ed">
            <div class="modal-content-res-ed">
                <div class="close">+</div><br>
                <form action="indexLogged.php" method="POST">
                    <table id="form">
                        <caption><h2>Rezerwacja wirtualnego biletu</h2></caption>
                        <tr>
                            <td>Tytuł filmu</td>
                            <td>
                                <select id="title_ed" name="title_ed">
                                    <option value="Jeden gniewny człowiek">Jeden gniewny człowiek</option>
                                    <option value="Ciche miejsce 2">Ciche miejsce 2</option>
                                    <option value="Cruella">Cruella</option>
                                    <option value="Mortal Combat">Mortal Combat</option>
                                    <option value="Druga połowa">Druga połowa</option>
                                    <option value="Avatar">Avatar</option>
                                    <option value="Avengers">Avengers</option>
                                    <option value="Hobbit">Hobbit</option>
                                    <option value="Kung fu Panda 2">Kung fu Panda 2</option>
                                    <option value="Batman">Batman</option>
                                    <option value="Pinokio">Pinokio</option>
                                    <option value="Venom">Venom</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Seansu</td>
                            <td><input id="date_res_ed" name="date_res_ed" type="date" required></td>
                        </tr>
        
                        <tr>
                            <td>Język Dubbingu</td>
                            <td>
                                <select id="jezyk_ed" name="jezyk_ed">
                                    <option value="Oryginalny">Oryginalny</option>
                                    <option value="Polski">Polski</option>
                                    <option value="Angielski">Angielski</option>
                                    <option value="Hiszpański">Hiszpański</option>
                                    <option value="Niemiecki">Niemiecki</option>
                                    <option value="Francuski">Francuski</option>
                                </select>
                            </td>
                        </tr>
                    </table><br>

                    <b>Szczegóły</b><br>
                    <?php
                        $szczegoly = ["Z napisami", "Opcja 3D", "Wersja reżyserska"];
                        echo "<input id='ch1_ed' class='ckeck' name='szczegol_ed[]' type='checkbox' value='Z napisami'>Z napisami";
                        echo "<input id='ch2_ed' class='ckeck' name='szczegol_ed[]' type='checkbox' value='Opcja 3D'>Opcja 3D";
                        echo "<input id='ch3_ed' class='ckeck' name='szczegol_ed[]' type='checkbox' value='Wersja reżyserska'>Wersja reżyserska";
                        echo "<br><br>";
                    ?>
                    
                    <b>Płatność</b><br>
                    <input id="rad1_ed" class="radio" name="platnosc_ed" type="radio" value="visa" checked>Visa
                    <input id="rad2_ed" class="radio" name="platnosc_ed" type="radio" value="mastercard">MasterCard
                    <input id="rad3_ed" class="radio" name="platnosc_ed" type="radio" value="blik">Blik<br>

                    <input class="button" type="submit" name="submit" value="Zapisz zmiany">
                    <input type="hidden" name="hidden" id="hidden" value="">
                </form>
            </div>
        </div>

        <div id="calosc">
            <div id="kontener">
                <header id="baner">
                    <div id="mainBanner">
                        <img id="mainImg" src="pictures/MortalKombat.jpg" alt="mianimg">
                    </div>
                    
                    <div id="miniaturki">
                        <figure class="navImg">
                            <img src="pictures/1.jfif" alt="img1">
                        </figure>
                        
                        <figure class="navImg">
                            <img src="pictures/avengers.jfif" alt="img2">
                        </figure>
                        
                        <figure class="navImg">
                            <img src="pictures/Mando.jpg" alt="img3">
                        </figure>
                    </div>
                </header>
                
                <div id="nawigacyjny">
                    <nav id="menu">
                        <ul id="nav">
                            <li id="repertuar"><a>Repertuar</a></li>
                            <li id="media"><a>Cennik</a></li>
                            <li><a onclick="show()">Moje Rezerwacje</a></li>
                            <li id="last"><a>Informacje</a></li>
                        </ul>
                    </nav>
                </div>
                <br>
                <main>
                    <div id="dynamic">
                        <table id="rep">
                            <caption><h2>REPERTUAR</h2></caption>
                            
                            <tbody>
                                <tr>
                                    <td>FILMY</td>
                                    <td>przed południem</td>
                                    <td>po południu</td>
                                    <td>wieczorem</td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="JGC">Jeden Gniewny Człowiek</td>
                                    <td></td>
                                    <td><a class="godzina">14:00</a></td>
                                    <td><a class="godzina">21:00</a></td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="CM2">Ciche Miejsce 2</td>
                                    <td><a class="godzina">12:15</a></td>
                                    <td><a class="godzina">15:15</a></td>
                                    <td><a class="godzina">19:30</a></td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="Cruella">Cruella</td>
                                    <td><a class="godzina">10:10</a></td>
                                    <td><a class="godzina">13:15</a></td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="MortalCombat">Mortal Combat</td>
                                    <td></td>
                                    <td><a class="godzina">16:00</a></td>
                                    <td><a class="godzina">20:30</a></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="DrugaPolowa">Druga Połowa</td>
                                    <td><a class="godzina">11:00</a></td>
                                    <td></td>
                                    <td><a class="godzina">21:45</a></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="CWDG">Co w Duszy Gra</td>
                                    <td><a class="godzina">11:30</a></td>
                                    <td><a class="godzina">14:00</a></td>
                                    <td><a class="godzina">19:00</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <br><hr>
                    
                    <div id="polecane">
                        <header>Polecane</header>
                        
                        <section id="plakaty">
                            <figure data-nazwa="avatar">
                                <img class="plakat" src="plakaty/avatar.jfif" alt="plakat1">
                                <figcaption>Avatar</figcaption>
                             </figure>
                            
                            <figure data-nazwa="avengers">
                                <img class="plakat" src="plakaty/avengers.jfif" alt="plakat2">
                                <figcaption>Avengers</figcaption>
                            </figure>
                            
                            <figure data-nazwa="hobbit">
                                <img class="plakat" src="plakaty/hobbit.jfif" alt="plakat3">
                                <figcaption>Hobbit</figcaption>
                            </figure>
                            
                            <figure data-nazwa="kfp">
                                <img class="plakat" src="plakaty/kfp.jfif" alt="plakat4">
                                <figcaption>Kung Fu Panda 2</figcaption>
                            </figure>
                            
                            <figure data-nazwa="batman">
                                <img class="plakat" src="plakaty/batman.jfif" alt="plakat5">
                                <figcaption>Batman</figcaption>
                            </figure>
                            
                            <figure data-nazwa="pinokio">
                                <img class="plakat" src="plakaty/Pinokio.jfif" alt="plakat6">
                                <figcaption>Pinokio</figcaption>
                            </figure>
                            
                            <figure data-nazwa="venom">
                                <img class="plakat ostatni" src="plakaty/venom.jfif" alt="plakat7">
                                <figcaption>Venom</figcaption>
                            </figure>
                        </section>
                    </div>
                    
                    <br><hr>
                    
                    <div id="zapowiedzi">
                        <header>
                            Zapowiedzi
                        </header>
                        
                        <section id="zwiastuny">
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/odM92ap8_c0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>02.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/FUK2kdPsBws" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>04.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/CQufSiC-Hck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>08.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/t2eTk6rNC88" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>13.06</figcaption>
                            </figure>
                        </section>
                    </div>
                </main>
                <br>
            </div>
        </div>
        <?php
            if(filter_input(INPUT_POST, "submit")){
                $akcja = filter_input(INPUT_POST, "submit");
                switch($akcja){
                    case "Edytuj":
                        getTicketData($db);
                    break;
                }
            }
        ?>
        <footer> &copy;BM </footer>
        <script src="JS/opisy.js"></script>
        <script src="JS/opisyRepertuar.js"></script>
        <script src="JS/popup_logged.js"></script>
        <script src="JS/profil.js"></script>
        <script src="JS/showTickets.js"></script>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </body>
</html>